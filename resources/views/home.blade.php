@extends('layouts.app')

@section('title', 'Home - Article Blog')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to ArticleBlog</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Discover amazing articles written by our community. Join us to share your own stories!
        </p>
    </div>

    <!-- Articles Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" 
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-image text-gray-500 text-4xl"></i>
                    </div>
                @endif
                
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-user mr-1"></i>{{ $article->user->name }}</span>
                        <span><i class="fas fa-calendar mr-1"></i>{{ $article->created_at->format('M d, Y') }}</span>
                    </div>
                    
                    <a href="{{ route('article.show', $article->slug) }}" 
                       class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                        Read More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Articles Yet</h3>
                <p class="text-gray-500">Be the first to share your story!</p>
                @guest
                    <a href="{{ route('register') }}" class="inline-block mt-4 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Join Now
                    </a>
                @endguest
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($articles->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection