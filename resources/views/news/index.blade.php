<!-- resources/views/news/index.blade.php -->
@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h1>Latest News</h1>

    @foreach($latestNews as $news)
        <article>
            <h2><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></h2>
            <p>{{ Illuminate\Support\Str::limit($news->content, 100) }}</p>
        </article>
    @endforeach
@endsection
