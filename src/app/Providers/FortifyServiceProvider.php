<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\LoginRequest;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;


class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
    }

    public function boot()
    {
        RateLimiter::for('login', function (Request $request) {
            return [
                Limit::perMinute(1000)->by($request->ip()),
            ];
        });

        Fortify::loginView(fn() => view('auth.login'));
        Fortify::registerView(fn() => view('auth.register'));

        Fortify::authenticateUsing(function (Request $request) {
            $validator = Validator::make(
                $request->only('email', 'password'),
                [
                    'email'    => ['required', 'email'],
                    'password' => ['required'],
                ],
                [
                    'email.required'    => 'メールアドレスを入力してください',
                    'email.email'       => 'メールアドレスはメール形式で入力してください',
                    'password.required' => 'パスワードを入力してください',
                ]
            );

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                session()->flash('status', 'ログイン情報が登録されていません');
                return null;
            }

            return $user;
        });
    }
}