<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExportController;

// お問い合わせ
Route::get('/', [ContactController::class,'index'])->name('contact.index');;
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/thanks', [ContactController::class, 'store'])->name('contact.thanks');

// 管理画面
Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.admin');
    Route::get('/admin/search', [SearchController::class,'search'])->name('admin.search');
    Route::post('/admin/delete/{id}', [AdminController::class,'delete'])->name('admin.delete');
    Route::get('/admin/export', [ExportController::class,'export'])->name('admin.export');
});

Route::get('/debug-auth', function () {
    return [
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
    ];
});

Route::post('/admin/delete/{id}', [AdminController::class, 'delete'])
    ->name('admin.delete')
    ->middleware('auth');