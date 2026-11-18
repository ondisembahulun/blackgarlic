<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => __('Mohon masukkan nama lengkap Anda.'),
            'email.required' => __('Mohon cantumkan alamat email Anda.'),
            'email.email' => __('Format email yang dimasukkan tidak valid.'),
            'message.required' => __('Pesan atau pertanyaan tidak boleh kosong.'),
        ]);

        $validated['ip_address'] = $request->ip();

        ContactMessage::create($validated);

        return redirect()->route('kontak')->with('success', __('Pesan Anda berhasil dikirim! Tim Bawang Hitam Sembalun akan segera menghubungi Anda.'));
    }
}
