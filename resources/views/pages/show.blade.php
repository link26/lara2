{{-- resources/views/pages/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
@endsection
