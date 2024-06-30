<!-- resources/views/faq/faq.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8 p-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Frequently Asked Questions</h2>
        <div class="faq-container space-y-4">
            @foreach ($faqs as $faq)
                <div class="faq-item border-b pb-4">
                    <h3 class="text-2xl font-semibold">{{ $faq->question }}</h3>
                    <p class="mt-2 text-lg">{{ $faq->answer }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
