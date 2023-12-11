{{-- resources/views/pages/show.blade.php --}}

@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
@endsection
