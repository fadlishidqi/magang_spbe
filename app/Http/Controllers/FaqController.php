<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Metode untuk pengguna biasa
    public function showFaqs()
    {
        $faqs = Faq::all();
        return view('faq.faq', compact('faqs')); // Mengarahkan ke resources/views/faq/faq.blade.php
    }

    // Metode untuk admin
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs')); // Mengarahkan ke resources/views/admin/faq/index.blade.php
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'pertanyaan' => $request->question,
            'jawaban' => $request->answer
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update([
            'pertanyaan' => $request->question,
            'jawaban' => $request->answer
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
