<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('home', compact('faqs'));
    }
}
