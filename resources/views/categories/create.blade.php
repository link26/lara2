{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Создание категории</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="category_name">Название категории:</label>
        <input type="text" name="category_name" id="category_name" required>

        <label for="category_photo">Фото категории:</label>
        <input type="file" name="category_photo" id="category_photo">

        <label for="category_text">Описание категории:</label>
        <textarea name="category_text" id="category_text"></textarea>

        <button type="submit">Создать</button>
    </form>
@endsection
