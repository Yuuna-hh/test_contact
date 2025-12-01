<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Contact;
use App\Models\Category; 

class ExportController extends Controller
{
    public function export(Request $request)
    {

        $query = Contact::with('category');

        if ($request->keyword) {
            $query->where(function($sub) use ($request) {
                $sub->where('last_name', 'like', "%{$request->keyword}%")
                    ->orWhere('first_name', 'like', "%{$request->keyword}%")
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

        $response = new StreamedResponse(function() use ($contacts){
            $handle = fopen('php://output','w');

            fputcsv($handle, [
                'ID', '姓', '名', '性別', 'メール', '電話番号', '住所', '建物名', '種類', '内容'
            ]);

            foreach($contacts as $c){
                fputcsv($handle, [
                    $c->id,
                    $c->last_name,
                    $c->first_name,
                    $c->gender_label,
                    $c->email,
                    $c->tel,
                    $c->address,
                    $c->building,
                    $c->category->content,
                    $c->detail,
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set(
            'Content-Disposition',
            'attachment; filename="'.$filename.'"'
        );

        return $response;
    }
}