{{-- resources/views/admin/brands/create.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Создание бренда</h1>
    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="brand_category_id">Категория:</label>
        <select name="brand_category_id" id="brand_category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>

        <label for="brand_name">Название бренда:</label>
        <input type="text" id="brand_name" name="brand_name" required>

        <label for="brand_photo">Фото бренда:</label>
        <input type="file" id="brand_photo" name="brand_photo">

        {{-- Дополнительные поля, как brand_pdf, brand_star1, brand_star2, brand_star3, brand_text_napr --}}

        <button type="submit">Создать</button>
    </form>
@endsection
