<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan',
        'jawaban',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('faq.faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        $faq = Faq::create($request->all());

        return response()->json($faq, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }

        return response()->json($faq);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'sometimes|required|string|max:255',
            'jawaban' => 'sometimes|required|string',
        ]);

        $faq = Faq::find($id);

        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }

        $faq->update($request->all());

        return response()->json($faq);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }

        $faq->delete();

        return response()->json(['message' => 'FAQ deleted']);
    }
}
