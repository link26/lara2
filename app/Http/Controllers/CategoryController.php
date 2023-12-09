<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Отображение списка категорий
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Показ формы для создания новой категории
    public function create()
    {
        return view('categories.create');
    }

    // Сохранение новой категории в базе данных
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'category_text' => 'nullable',
            // Правила валидации для других полей
        ]);

        if ($request->hasFile('category_photo')) {
            $path = $request->file('category_photo')->store('public/categories');
            $validatedData['category_photo'] = $path;
        }

        Category::create($validatedData);
        return redirect()->route('categories.index');
    }


    // Отображение одной категории
    public function show(Category $category)
    {
        // Загрузка категории вместе с ее брендами
        $category->load('brands');

        return view('categories.show', compact('category'));
    }

    // Показ формы для редактирования категории
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Обновление категории в базе данных
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            // Другие поля для валидации
        ]);

        $category->update($validatedData);
        return redirect()->route('categories.index');
    }

    // Удаление категории
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
