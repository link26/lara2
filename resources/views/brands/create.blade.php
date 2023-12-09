{{-- resources/views/brands/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Создание бренда</h1>
    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="brand_name">Название бренда:</label>
        <input type="text" name="brand_name" id="brand_name" required>

        <label for="brand_category_id">Категория:</label>
        <select name="brand_category_id" id="brand_category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>

        <label for="brand_photo">Фото бренда:</label>
        <input type="file" name="brand_photo" id="brand_photo">

        <label for="brand_pdf">PDF бренда:</label>
        <input type="file" name="brand_pdf" id="brand_pdf">

        <!-- Другие поля, такие как brand_star1, brand_star2, brand_star3, brand_text_napr -->

        <button type="submit">Создать</button>
    </form>
@endsection
