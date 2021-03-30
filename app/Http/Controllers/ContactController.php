<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        $items = Contact::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

   
    public function store(Request $request)
    {
        $item = new Contact;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }

    
    public function show(Contact $contact)
    {
        //
    }

   
    public function update(Request $request, Contact $contact)
    {
        $item = Contact::where('id', $contact->id)->first();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

   
    public function destroy(Contact $contact)
    {
        $item = Contact::where('id', $contact->id)->delete();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => $item,
            ], 404);
        }
    }
}
