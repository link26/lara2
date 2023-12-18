@extends('layouts.admin')

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

@section('content')
    <h1>Создать страницу</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div>
            <label>Название</label>
            <input type="text" name="title" required>
        </div>

        @include('ckfinder::setup')

        <div id="editor"></div>
        <textarea id="editor1" name="content"></textarea>

        <script>
            CKEDITOR.replace('editor1');
        </script>

        <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
        <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>


        <div>
            <label>Ссылка URL </label>
            <input type="text" name="link"> (если страница является ссылкой, то форма выше не заполняется)
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

