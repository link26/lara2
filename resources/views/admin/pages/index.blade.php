@extends('layouts.admin')

@section('content')
    <h1>Страницы</h1>
    <a href="{{ route('pages.create') }}">Создать новую страницу</a>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>
                    <a href="{{ route('pages.edit', $page) }}">Редактировать</a>
                    <form action="{{ route('pages.destroy', $page) }}" method="POST" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Вы уверены, что хотите удалить эту страницу? Это действие необратимо.');
        }
    </script>
@endsection
