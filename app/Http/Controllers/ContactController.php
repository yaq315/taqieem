<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\Contact;


class ContactController extends Controller
{
     public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('dashboard.contacts.index', compact('contacts'));
    }
 
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'mail' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Contact::create([
        'name' => $request->name,
        'mail' => $request->mail,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Your message has been sent successfully!');
}

}
