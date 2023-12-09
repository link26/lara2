<!-- resources/views/admin/news/index.blade.php -->

@extends('layouts.admin')

@section('content')

    <h1>Новости</h1>

    @foreach($news as $item)
        <p>{{ $item->title }} - <a href="{{ route('news.edit', $item) }}">Edit</a></p>
    @endforeach

    <a href="{{ route('news.create') }}">Add News</a>


@endsection
