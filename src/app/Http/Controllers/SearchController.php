<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->keyword) {
            $keyword = $request->keyword;

            $query->where(function($sub) use ($keyword) {
                $sub->where('last_name', 'like', "%{$keyword}%")
                    ->orWhere('first_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if (in_array($request->gender, ['1', '2', '3'])) {
            $query->where('gender', $request->gender);
        } //「全て」も検索可能。「性別」placeholderとの衝突回避

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query
            ->paginate(7)
            ->appends($request->query());
        $categories = Category::all();

        return view('admin.admin', compact('contacts', 'categories'));
    }
}