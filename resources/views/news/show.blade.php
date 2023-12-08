<!-- resources/views/news/show.blade.php -->
@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{!! $news->content !!}</p>
    <a href="{{ url('/news') }}">Back to News</a>
@endsection
