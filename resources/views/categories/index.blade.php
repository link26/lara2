{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Категории</h1>
    <a href="{{ route('categories.create') }}">Создать новую категорию</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->category_name }}
                <a href="{{ route('categories.show', $category) }}">Просмотреть</a>
                <a href="{{ route('categories.edit', $category) }}">Редактировать</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
