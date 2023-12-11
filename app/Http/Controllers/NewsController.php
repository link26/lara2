<?php

// app/Http/Controllers/NewsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Brand; // Добавьте использование модели Brand

class NewsController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(5)->get();
        $brands = Brand::latest()->take(5)->get(); // Получаем пять последних брендов

        return view('welcome', [
            'latestNews' => $latestNews,
            'brands' => $brands
        ]);
    }

    public function newsp()
    {
        //все новости
        $News = News::latest()->paginate(6);
        return view('news.index', compact('News'));
        //return view('news.index', compact('latestNews'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

}
