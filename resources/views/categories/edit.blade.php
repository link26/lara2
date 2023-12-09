{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Редактирование категории: {{ $category->category_name }}</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="category_name">Название категории:</label>
        <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" required>

        <label for="category_photo">Фото категории:</label>
        <input type="file" name="category_photo" id="category_photo">

        <label for="category_text">Описание категории:</label>
        <textarea name="category_text" id="category_text">{{ $category->category_text }}</textarea>

        <button type="submit">Обновить</button>
    </form>
@endsection
