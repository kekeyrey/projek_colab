@extends('layouts.app')
@section('title', $article->title . ' - Article Blog')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" 
                 class="w-full h-64 object-cover">
        @endif
        
        <div class="p-8">
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>
                <div class="flex items-center text-gray-600 text-sm">
                    <i class="fas fa-user mr-2"></i>
                    <span class="mr-4">{{ $article->user->name }}</span>
                    <i class="fas fa-calendar mr-2"></i>
                    <span class="mr-4">{{ $article->created_at->format('F d, Y') }}</span>
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                        {{ ucfirst($article->status) }}
                    </span>
                </div>
            </header>
            
            <div class="prose max-w-none">
                <div class="text-lg text-gray-700 mb-6 font-medium">
                    {{ $article->excerpt }}
                </div>
                
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>
    </article>
    
    <div class="mt-8 text-center">
        <a href="{{ route('home') }}" class="inline-block bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">
            <i class="fas fa-arrow-left mr-2"></i>Back to Home
        </a>
    </div>
</div>
@endsection