{{-- resources/views/brands/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Редактирование бренда: {{ $brand->brand_name }}</h1>
    <form action="{{ route('brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="brand_name">Название бренда:</label>
        <input type="text" name="brand_name" id="brand_name" value="{{ $brand->brand_name }}" required>

        <label for="brand_category_id">Категория:</label>
        <select name="brand_category_id" id="brand_category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $brand->brand_category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
            @endforeach
        </select>

        <label for="brand_photo">Фото бренда:</label>
        <input type="file" name="brand_photo" id="brand_photo">

        <label for="brand_pdf">PDF бренда:</label>
        <input type="file" name="brand_pdf" id="brand_pdf">

        <!-- Другие поля, такие как brand_star1, brand_star2, brand_star3, brand_text_napr -->

        <button type="submit">Обновить</button>
    </form>
@endsection
