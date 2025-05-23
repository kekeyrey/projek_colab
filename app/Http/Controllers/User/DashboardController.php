<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('user.dashboard', compact('articles'));
    }
}