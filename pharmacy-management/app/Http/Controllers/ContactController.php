<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    // Display the contact form
    public function contact()
    {

        return view('contact');
    }

    // Store the contact message in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the message
        Contact::create($request->all());

        return redirect()->route('index')->with('success', 'Your message has been sent successfully!');
    }

    public function show()
    {
        $contacts = Contact::latest()->latest()->paginate(5);
        return view('pharmacist.contacts.index', compact('contacts'));
    }
}
