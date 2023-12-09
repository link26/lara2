@extends('layouts.admin')

@section('content')
    <h1>{{ $category->category_name }}</h1>
    <p>{{ $category->category_text }}</p>
    <!-- Дополнительные детали категории -->
@endsection
