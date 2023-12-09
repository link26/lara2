@extends('layouts.admin')

@section('content')
    <h1>Редактирование категории: {{ $category->category_name }}</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="category_name">Название категории:</label>
        <input type="text" id="category_name" name="category_name" value="{{ $category->category_name }}" required>

        <label for="category_text">Описание категории:</label>
        <textarea id="category_text" name="category_text">{{ $category->category_text }}</textarea>

        <label for="category_photo">Фото категории:</label>
        <input type="file" id="category_photo" name="category_photo">
        @if($category->category_photo)
            <div>
                <img src="{{ asset('storage/'.$category->category_photo) }}" alt="Фото категории" style="max-width: 200px;">22
                <img src="{{ asset('storage/categories/'.$category->category_photo) }}" alt="Фото категории" style="max-width: 200px;">
                <img src="{{ url('storage/'.$category->category_photo) }}" alt="Фото категории" style="max-width: 200px;">

            </div>
        @endif

        <button type="submit">Обновить</button>
    </form>
@endsection
