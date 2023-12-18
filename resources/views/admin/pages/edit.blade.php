@extends('layouts.admin')

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>



@section('content')
    <h1>Редактировать страницу</h1>
    <form action="{{ route('pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Название</label>
            <input type="text" name="title" value="{{ $page->title }}" required>
        </div>

        <div id="editor"></div>
        <textarea id="editor1" name="content" >{{ $page->content }}</textarea>

        <script>

            CKEDITOR.replace('editor1', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });

        </script>


        <div>
            <label>Ссылка URL </label>
            <input type="text" name="link" value="{{ $page->link }}" > (если страница является ссылкой, то форма выше не заполняется)
        </div>
        <button type="submit">Сохранить изменения</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editor = new toastui.Editor({
                el: document.querySelector('#editor'),
                height: '500px',
                initialEditType: 'markdown',
                previewStyle: 'vertical',
                initialValue: document.querySelector('#editor-textarea').value
            });

            // Синхронизация содержимого редактора с textarea
            editor.on('change', () => {
                document.querySelector('#editor-textarea').value = editor.getMarkdown();
            });
        });
    </script>


@endsection
