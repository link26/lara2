<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Показать форму для загрузки изображений.
     */

    public function index()
    {
        //return view('admin.files.index');
        $images = Image::orderBy('created_at', 'desc')->paginate(9); // Сортировка по дате создания, сначала новые
        return view('admin.files.index', compact('images'));
    }

    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Сохранить новое изображение.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Сохранение пути к изображению в базу данных
        $image = new Image;
        $image->file_path = 'images/' . $imageName;
        $image->save();

        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('image',$imageName);
    }

    // Дополнительные методы по необходимости...
}
