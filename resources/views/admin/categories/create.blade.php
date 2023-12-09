@extends('layouts.admin')

@section('content')
    <h1>Создание новой категории</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="category_name">Название категории:</label>
        <input type="text" id="category_name" name="category_name" required>

        <label for="category_text">Описание категории:</label>
        <textarea id="category_text" name="category_text"></textarea>

        <label for="category_photo">Фото категории:</label>
        <input type="file" id="category_photo" name="category_photo">

        <button type="submit">Создать</button>
    </form>
@endsection
