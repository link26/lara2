@extends('layouts.admin')

@section('content')
    <h1>Страницы</h1>
    <a href="{{ route('files.create') }}">Загрузить новый файл</a>
    <br><br>

    <div>
        @if ($message = Session::get('success'))
            <div>
                <strong>{{ $message }}</strong>
            </div>
            <div>
                <img src="/images/{{ Session::get('image') }}">
            </div>
        @endif

        @if (count($errors) > 0)
            <div>
                <strong>Ошибки:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/image/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Выберите изображение:</label>
                <input type="file" name="image">
            </div>
            <div>
                <button type="submit">Загрузить</button>
            </div>
        </form>
    </div>


@endsection

