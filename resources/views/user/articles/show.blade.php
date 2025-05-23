@extends('layouts.user')

@section('title', $article->title)
@section('header', 'Article Details')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover">
        @endif
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-900">{{ $article->title }}</h1>
                <span class="px-3 py-1 rounded-full text-sm {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($article->status) }}
                </span>
            </div>
            
            <div class="text-gray-600 text-sm mb-4">
                <i class="fas fa-calendar mr-2"></i>Created: {{ $article->created_at->format('F d, Y g:i A') }}
                @if($article->updated_at != $article->created_at)
                    <span class="ml-4"><i class="fas fa-edit mr-2"></i>Updated: {{ $article->updated_at->format('F d, Y g:i A') }}</span>
                @endif
            </div>
            
            <div class="prose max-w-none">
                <div class="text-lg text-gray-700 mb-6 font-medium border-l-4 border-blue-500 pl-4 bg-blue-50 py-2">
                    {{ $article->excerpt }}
                </div>
                
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
            
            <div class="mt-8 flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('user.articles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Articles
                </a>
                
                <div class="space-x-3">
                    <a href="{{ route('user.articles.edit', $article) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        <i class="fas fa-edit mr-2"></i>Edit Article
                    </a>
                    
                    @if($article->status === 'published')
                        <a href="{{ route('article.show', $article->slug) }}" target="_blank" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                            <i class="fas fa-external-link-alt mr-2"></i>View Public
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection