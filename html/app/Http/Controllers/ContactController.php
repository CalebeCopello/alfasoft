<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function edit(Contact $contact) {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact) {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($contact->id, 'id'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts','email')->ignore($contact->id, 'id'),
            ],
        ]);
        $contact->update($validated);
        return redirect()->route('contacts.index')->with('success', "Contact <strong> {$contact->name} </strong> updated succesfully.");
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', "Contact <strong> {$contact->name} </strong> deleted succesfully.");
    }
}
