<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category; // Подключаем модель категорий
use Illuminate\Http\Request;

class BrandCategoryAdminController extends Controller
{
    // Отображение списка брендов
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    // Отображение формы для создания нового бренда
    public function create()
    {
        $categories = Category::all();
        return view('admin.brands.create', compact('categories'));
    }

    // Сохранение нового бренда
    // Сохранение нового бренда
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_category_id' => 'required|exists:categories,id', // Убедитесь, что категория существует
            // Добавьте правила валидации для других полей
        ]);

        // Обработка загрузки фото
        if ($request->hasFile('brand_photo')) {

            $path = $request->file('brand_photo')->store('brands', 'public');
            // Это сохранит файл в 'storage/app/public/categories' и вернет 'categories/имя_файла.png'
            $validatedData['brand_photo'] = $path;

            //$path = $request->file('brand_photo')->store('public/brands');
            //$validatedData['brand_photo'] = $path;
        }

        Brand::create($validatedData);

        return redirect()->route('admin.brands.index');
    }

    // Отображение формы для редактирования бренда
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $categories = Category::all();
        return view('admin.brands.edit', compact('brand', 'categories'));
    }

    // Обновление бренда
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_category_id' => 'required|exists:categories,id',
            // Дополнительные правила валидации
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('brand_photo')) {
            // Обработка загрузки файла
            $path = $request->file('brand_photo')->store('brands', 'public');
            $validatedData['brand_photo'] = $path;
        }

        $brand->update($validatedData);
        return redirect()->route('admin.brands.index');
    }

    // Удаление бренда
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Удаление фото бренда
        if ($brand->brand_photo) {
            Storage::delete('public/brands/' . $brand->brand_photo);
        }

        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
