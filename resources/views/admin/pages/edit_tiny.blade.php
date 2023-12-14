@extends('layouts.admin')

@section('content')
    <h1>Редактировать страницу</h1>
    <form action="{{ route('pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Название</label>
            <input type="text" name="title" value="{{ $page->title }}" required>
        </div>
        <div>
            <label>Содержание</label>
            {!! Form::textarea('content', $page->content, ['id' => 'editor']) !!}

        </div>
        <div>
            <label>Ссылка URL </label>
            <input type="text" name="link" value="{{ $page->link }}" > (если страница является ссылкой, то форма выше не заполняется)
        </div>
        <button type="submit">Сохранить изменения</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/qxo8orvilcs1r6me8dc1st7924eesz0lgni0x3vgm5g4luk6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'advlist autolink lists link image charmap print preview anchor code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image | code',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            verify_html: false,
            extended_valid_elements: "svg[*],defs[*],pattern[*],desc[*],metadata[*],g[*],mask[*],path[*],line[*],marker[*],rect[*],circle[*],ellipse[*],polygon[*],polyline[*],linearGradient[*],radialGradient[*],stop[*],image[*],view[*],text[*],textPath[*],title[*],tspan[*],glyph[*],symbol[*],switch[*],use[*],xlink[*]",
            valid_elements: '*[*]',
            custom_elements: 'svg,use'
        });
    </script>


@endsection
