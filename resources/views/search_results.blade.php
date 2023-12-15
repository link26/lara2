{{-- search_results.blade.php --}}

@extends('layouts.app') {{-- Предполагая, что у вас есть основной шаблон --}}

@section('content')
    <h1>Результаты Поиска</h1>

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="query" value="{{ request('query') }}" required/>
        <button type="submit">Поиск</button>
    </form>


    <div>
        <h2>Страницы:</h2><hr/>


        {{-- Блок страниц --}}
        <div>
            <h2>Страницы</h2>
            @forelse($pages as $page)
                <div>
                    <h3><a href="{{ url('/page/' . $page->slug) }}">{{ $page->title }}</a></h3>
                    <br/>{!! Str::limit($page->content, 200) !!}
                </div>
            @empty
                <p>Страницы не найдены.</p>
            @endforelse
        </div>

        {{-- Блок брендов --}}
        <div>
            <h2>Бренды</h2>
            @forelse($brands as $brand)
                <div>
                    <h3><a href="{{ route('brands.show', $brand->id) }}">{{ $brand->brand_name }}</a></h3>
                    {{-- Дополнительная информация о бренде --}}
                </div>
            @empty
                <p>Бренды не найдены.</p>
            @endforelse
        </div>



    </div>
@endsection
