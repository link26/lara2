{{-- resources/views/brands/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Бренды</h1>
    <a href="{{ route('brands.create') }}">Создать новый бренд</a>
    <ul>
        @foreach ($brands as $brand)
            <li>
                {{ $brand->brand_name }} (Категория: {{ $brand->category->category_name }})
                <a href="{{ route('brands.show', $brand) }}">Просмотреть</a>
                <a href="{{ route('brands.edit', $brand) }}">Редактировать</a>
                <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
