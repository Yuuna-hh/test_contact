<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::paginate(7);
        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'データが見つかりませんでした。');
        }

        $contact->delete();

        return redirect()->route('admin.admin')->with('success', '削除しました');
    }
}