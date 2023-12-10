{{-- resources/views/admin/brands/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Бренды</h1>
    <a href="{{ route('admin.brands.create') }}">Создать новый бренд</a>
    <ul>
        @foreach ($brands as $brand)
            <li>
                {{ $brand->brand_name }}
                <a href="{{ route('admin.brands.edit', $brand->id) }}">Редактировать</a>
                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
