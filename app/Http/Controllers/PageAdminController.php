<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        //dd($request->all());

       /* $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable|url',
            'link' => 'nullable|url',
            'slug' => 'nullable|url'
        ]);*/

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable', // Обычно 'content' это просто текст
            'link' => 'nullable|url',
        ]);

        // Создание и проверка уникальности слага
        $slug = $this->createSlug($validatedData['title']);

        $maxOrder = Page::max('order');
        $nextOrder = $maxOrder + 1;

        Page::create([
            'title' => $validatedData['title'],
            'slug' => $slug,
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


    // Метод для создания уникального слага
    private function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = Page::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }



}
