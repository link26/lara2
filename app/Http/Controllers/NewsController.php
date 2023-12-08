<?php

// app/Http/Controllers/NewsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(5)->get();
        return view('welcome', ['latestNews' => $latestNews]);
        //return view('news.index', compact('latestNews'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
/*
    public function last($id)
    {
        // Получение последних 4 новостей
        $latestNews = News::orderBy('created_at', 'desc')->take(4)->get();

        // Передача новостей в вид
        return view('welcome', ['latestNews' => $latestNews]);
    }*/
}
