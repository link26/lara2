{{-- resources/views/admin/brands/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Редактирование бренда: {{ $brand->brand_name }}</h1>
    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="brand_category_id">Категория:</label>
        <select name="brand_category_id" id="brand_category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $brand->brand_category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <label for="brand_name">Название бренда:</label>
        <input type="text" id="brand_name" name="brand_name" value="{{ $brand->brand_name }}" required>

        <label for="brand_photo">Фото бренда:</label>
        @if($brand->brand_photo)
            <div>
                <img src="{{ asset('storage/'.$brand->brand_photo) }}" alt="Текущее фото" style="max-height: 100px;">
            </div>
        @endif
        <input type="file" id="brand_photo" name="brand_photo">

        {{-- Дополнительные поля, как brand_pdf, brand_star1, brand_star2, brand_star3, brand_text_napr --}}

        <button type="submit">Обновить</button>
    </form>
@endsection
