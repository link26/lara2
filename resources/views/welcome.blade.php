@extends('layouts.app')
@section('title', 'Главная Index Main')
@section('content')
Фото брендов


                    <div class="container">
                        <div class="brands">
                            @foreach ($brands as $brand)
                                <div class="brand">
                                    <h3>{{ $brand->brand_name }}</h3>
                                    @if ($brand->brand_photo)
                                        <img src="{{ asset('storage/' . $brand->brand_photo) }}" alt="{{ $brand->brand_name }}" style="max-width: 200px;">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>




                <br><br>

                Новости:<br/>

                @foreach ($latestNews as $news)
                    <div>
                        <h3><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></h3>
                        <p>{{ $news->description }}</p>
                        <!-- Дополнительные детали новости -->
                    </div>
                @endforeach

@endsection
