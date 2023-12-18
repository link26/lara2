@extends('layouts.admin')


<style>

    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 колонки */
        grid-gap: 10px; /* Отступы между элементами */
        grid-row-gap: 100px; /* Отступы между рядами */
        transition: background-color 0.3s; /* Плавный переход фона */
    }
    .grid-item:hover {
        background-color: #f0f0f0; /* Слегка серый фон при наведении */
    }
    .image-title {
        text-align: center;
        margin: 10px 0; /* Отступы сверху и снизу */
        /* Дополнительные стили (размер шрифта, цвет и т.д.) */
    }

    .grid-item {
        display: grid;
        grid-template-rows: auto 1fr; /* Автоматическая высота для изображения и фиксированное пространство для кнопки */
        align-items: end; /* Выравнивание кнопки к нижней части контейнера */
    }
    .grid-item img {
        width: 70%;
        height: auto; /* Сохранение пропорций изображения */
        display: block; /* Убирает дополнительное пространство под изображением */
        margin: 0 auto; /* Центрирование кнопки */
        max-height: 500px;
    }
    .grid-item button {
        width: auto; /* Автоматическая ширина по содержимому */
        max-width: 80%; /* Максимальная ширина, например 80% от ширины grid-item */
        margin: 10px auto; /* Добавление отступов и центрирование */
        padding: 5px 10px 5px 5px; /* Отступы внутри кнопки */
    }

    /* Стили для пагинации */
    .pagination {
        display: flex;
        justify-content: center; /* Центрирование пагинации */
        list-style: none;
        padding: 0;
    }
    .pagination li {
        margin: 0 5px;
    }
    .pagination li a {
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
        font-size: 14px; /* Уменьшение размера шрифта */
    }
    .pagination li.active a {
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
    }
    .pagination li a:hover {
        background-color: #ddd;
        border-radius: 5px;
    }

    .flex {
        /* height: 20px; */
        width: 100px;
    }



</style>


@section('content')
    <h1>Файлы</h1>
    <a href="{{ route('files.create') }}">Загрузить новый файл</a>
    <br><br>

    <div class="grid-container">
        @foreach ($images as $image)
            <div class="grid-item">
                <a href="{{ asset($image->file_path) }}" target="_blank">
                    <img src="{{ asset($image->file_path) }}" alt="image">
                </a>
                <div class="image-title">{{ $image->file_path }}</div> <!-- Добавление названия фото -->
                <input type="text" value="{{ asset($image->file_path) }}" id="url{{ $image->id }}" style="display: none;">
                <button onclick="copyToClipboard('url{{ $image->id }}')" style="display: block; width: 100%;">Копировать URL</button>
            </div>

        @endforeach
    </div>

    <div style="text-align: center;">
    {{ $images->links() }} <!-- Пагинация -->
    </div>

    <script>
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId);
            copyText.style.display = "block";
            copyText.select();
            copyText.setSelectionRange(0, 99999); // Для мобильных устройств
            document.execCommand("copy");
            copyText.style.display = "none";
            alert("URL скопирован: " + copyText.value);
        }

    </script>


@endsection
