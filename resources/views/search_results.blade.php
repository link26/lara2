{{-- search_results.blade.php --}}

@extends('layouts.app') {{-- Предполагая, что у вас есть основной шаблон --}}

@section('content')
    <h1>Результаты Поиска</h1>

    <div>
        <h2>Страницы</h2><hr/>
        @forelse($pages as $page)
            <div>
                <h3>{{ $page->title }}</h3>
                <p>{!! Str::limit($page->content, 200) !!}</p>
            </div>
            <hr/>
        @empty
            <p>Страницы не найдены.</p>
        @endforelse
    </div>
@endsection
