@extends('layouts.admin')

<!-- Toast UI Editor CSS -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

<!-- Toast UI Editor JS -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>



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
        <textarea id="editor-textarea" name="content" style="display:none;">{{ $page->content }}</textarea>



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
