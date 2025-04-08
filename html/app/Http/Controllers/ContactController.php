<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|unique:contacts,contact|digits:9',
            'email' => 'required|email|unique:contacts,email'
        ]);
        $contact = Contact::create($validated);
        return redirect()->route('contacts.index')->with('success', "Contact <strong> {$contact->name} </strong> created successfully.");
    }

    public function show(Contact $contact) {
        return view('contacts.show', compact('contact'));
    }
}
