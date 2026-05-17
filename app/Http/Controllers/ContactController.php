<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function send(ContactRequest $request)
    {
        // Process the contact form submission
        // Example: Mail::to('admin@hospital.com')->send(new ContactMail($request->validated()));
        
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
