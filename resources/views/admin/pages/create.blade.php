@extends('layouts.admin')



@section('content')
    <h1>Создать страницу</h1>
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div>
            <label>Название</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Слаг (URL)</label>
            <input type="text" name="slug" required>
        </div>
        <div>
            <label>Содержание</label>
            {!! Form::textarea('content', null, ['id' => 'editor']) !!}
        </div>
        <button type="submit">Сохранить</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/qxo8orvilcs1r6me8dc1st7924eesz0lgni0x3vgm5g4luk6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        });
    </script>

@endsection
