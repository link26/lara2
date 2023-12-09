{{-- resources/views/brands/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ $brand->brand_name }}</h1>
    <p>Категория: {{ $brand->category->category_name }}</p>
    <p>{{ $brand->brand_text_napr }}</p>
    <!-- Вывод фото и PDF, если они есть -->
    @if($brand->brand_photo)
        <img src="{{ url($brand->brand_photo) }}" alt="Фото бренда">
    @endif
    @if($brand->brand_pdf)
        <a href="{{ url($brand->brand_pdf) }}">Скачать PDF</a>
    @endif
@endsection
