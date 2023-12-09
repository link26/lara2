@extends('layouts.admin')

@section('content')
    <h1>Категории</h1>
    <a href="{{ route('admin.categories.create') }}">Создать новую категорию</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->category_name }}
                <a href="{{ route('admin.categories.edit', $category) }}">Редактировать</a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
