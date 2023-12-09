{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Категории</h1>

    <ul>
        @foreach ($categories as $category)
            <li>
                {{-- Ссылка на категорию --}}
                <h3><a href="{{ route('categories.show', $category->id) }}">{{ $category->category_name }}</a></h3>

                {{-- Отображение фото, если оно есть --}}
                @if ($category->category_photo)
                    <img src="{{ asset('storage/' . $category->category_photo) }}" alt="Фото {{ $category->category_name }}" style="max-width: 200px;">
                @else
                    <p>Фото для этой категории отсутствует.</p>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
