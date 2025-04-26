<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    // Menampilkan halaman kontak
    public function index()
    {
        $contacts = ContactUs::all();
        return view('students.contact_us', compact('contacts'));
    }

    // Menyimpan pesan kontak
    public function store(Request $request)
    {
        $validated = $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'Email' => 'required|email',
            'Phone_number' => 'nullable|string|max:15',
            'Message' => 'required|string',
        ]);

        ContactUs::create($validated);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    // Menampilkan detail pesan kontak
    public function show($id)
    {
        $contact = ContactUs::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Message not found.');
        }

        return view('students.contact_us_detail', compact('contact'));
    }

    // Menghapus pesan kontak
    public function destroy($id)
    {
        $contact = ContactUs::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Message not found.');
        }

        $contact->delete();

        return redirect()->route('contact_us.index')->with('success', 'Message deleted successfully.');
    }
}
