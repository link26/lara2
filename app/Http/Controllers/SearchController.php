<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\News;
use App\Models\Page;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $pages = Page::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get();

        $brands = Brand::where('brand_name', 'like', "%{$query}%")->get();

        return view('search_results', compact('pages', 'brands')); // Убедитесь, что у вас есть это представление
    }
}
