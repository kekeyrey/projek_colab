<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->with('user')
            ->latest()
            ->paginate(9);

        return view('home', compact('articles'));
    }

    public function show(Article $article)
    {
        // Jika belum login, redirect ke login
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('message', 'Please login to read the full article');
        }

        return view('article-detail', compact('article'));
    }
}