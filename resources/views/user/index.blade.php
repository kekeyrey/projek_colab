@extends('layouts.user')

@section('title', 'My Articles')
@section('header', 'My Articles')

@section('content')
<div class="mb-6">
    <a href="{{ route('user.articles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Create New Article
    </a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-md">
    @if($articles->count() > 0)
        <ul class="divide-y divide-gray-200">
            @foreach($articles as $article)
                <li>
                    <div class="px-4 py-4 flex items-center justify-between">
                        <div class="flex items-center">
                            @if($article->image)
                                <img class="h-16 w-16 rounded-lg object-cover mr-4" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                            @else
                                <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-500">{{ Str::limit($article->excerpt, 100) }}</p>
                                <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ $article->created_at->format('M d, Y') }}
                                    </span>
                                    <span class="px-2 py-1 rounded-full text-xs {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($article->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('user.articles.show', $article) }}" class="text-blue-600 hover:text-blue-800 p-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('user.articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-800 p-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('user.articles.destroy', $article) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 p-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        
        <div class="px-4 py-3 bg-gray-50">
            {{ $articles->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-newspaper text-4xl text-gray-300 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No articles yet</h3>
            <p class="text-gray-500 mb-4">Create your first article to get started!</p>
            <a href="{{ route('user.articles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>Create Article
            </a>
        </div>
    @endif
</div>
@endsection