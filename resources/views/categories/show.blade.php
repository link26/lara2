{{-- resources/views/categories/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ $category->category_name }}</h1>
    <p>{{ $category->category_text }}</p>
    <!-- Вывод фото, если оно есть -->
    @if($category->category_photo)
        <img src="{{ url('storage/'.$category->category_photo) }}" alt="Фото категории" style="max-width: 200px;">
    @endif

    <h2>Бренды в этой категории:</h2>
    <ul>
        @foreach ($category->brands as $brand)
            <li><a href="{{ route('brands.show', $brand) }}">{{ $brand->brand_name }}</a></li>
            <!-- Можете добавить дополнительные детали о брендах здесь -->


        @endforeach
    </ul>
@endsection
