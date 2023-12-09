<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create(Request $request)
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'link' => 'nullable|url'
        ]);

        $maxOrder = Page::max('order');
        $nextOrder = $maxOrder + 1;

        Page::create([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'content' => $validatedData['content'],
            'order' => $nextOrder,
            'link' => $validatedData['link']
        ]);

        return redirect()->route('pages.index');
    }



    public function createLinkPage()
    {
        return view('admin.pages.create_link');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $page->update($request->all());
        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index');
    }
}
