<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('contact.contact', compact('categories'));
    }

    public function confirm(ContactRequest  $request) {
        $inputs = $request->all();
        $category_name = Category::find($inputs['category_id'])->content;

        return view('contact.confirm', [
            'inputs' => $inputs,
            'category_name' => $category_name,
        ]);
    }

    public function store(Request $request) {
        // 修正
        if ($request->action === 'back') {
            return redirect()->route('contact.index')->withInput();
        }

        // 送信
        $tel = $request->tel1 . $request->tel2 . $request->tel3;

        Contact::create([
            'last_name'   => $request->last_name,
            'first_name'  => $request->first_name,
            'gender'      => $request->gender,
            'email'       => $request->email,
            'tel'         => $tel,
            'address'     => $request->address,
            'building'    => $request->building,
            'category_id' => $request->category_id,
            'detail'      => $request->detail,
        ]);

        return view('contact.thanks');
    }
}