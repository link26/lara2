<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Отображение списка брендов
    public function index()
    {
        $brands = Brand::with('category')->get(); // Загрузка связанных категорий
        return view('brands.index', compact('brands'));
    }

    // Показ формы для создания нового бренда
    public function create()
    {
        $categories = Category::all(); // Получение списка категорий для выпадающего списка
        return view('brands.create', compact('categories'));
    }

    // Сохранение нового бренда в базе данных
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_category_id' => 'required|exists:categories,id',
            'brand_name' => 'required|max:255',
            // Другие поля для валидации
        ]);

        Brand::create($validatedData);
        return redirect()->route('brands.index');
    }

    // Отображение одного бренда
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    // Показ формы для редактирования бренда
    public function edit(Brand $brand)
    {
        $categories = Category::all(); // Получение списка категорий
        return view('brands.edit', compact('brand', 'categories'));
    }

    // Обновление бренда в базе данных
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'brand_category_id' => 'required|exists:categories,id',
            'brand_name' => 'required|max:255',
            // Другие поля для валидации
        ]);

        $brand->update($validatedData);
        return redirect()->route('brands.index');
    }

    // Удаление бренда
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
