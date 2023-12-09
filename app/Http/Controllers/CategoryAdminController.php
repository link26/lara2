<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    // Отображение списка категорий
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Показ формы для создания новой категории
    public function create()
    {
        return view('admin.categories.create');
    }

    // Сохранение новой категории в базе данных
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'category_text' => 'nullable', // Валидация для текста
            // Другие правила валидации
        ]);

        if ($request->hasFile('category_photo')) {
            // Обработка загрузки файла
            $path = $request->file('category_photo')->store('categories', 'public');
            // Это сохранит файл в 'storage/app/public/categories' и вернет 'categories/имя_файла.png'

            $validatedData['category_photo'] = $path;
        }

        Category::create($validatedData);
        return redirect()->route('admin.categories.index');
    }


    // Отображение одной категории
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // Показ формы для редактирования категории
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Обновление категории в базе данных
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'category_text' => 'nullable', // Валидация для текста
            // Другие правила валидации
        ]);

        if ($request->hasFile('category_photo')) {
            // Обработка загрузки файла
            $path = $request->file('category_photo')->store('categories', 'public');
            $validatedData['category_photo'] = $path;
        }

        $category->update($validatedData);
        return redirect()->route('admin.categories.index');
    }

    // Удаление категории
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
