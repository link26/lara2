<!-- resources/views/admin/news/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>



</head>


<form action="{{ route('news.store') }}" method="post">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <label for="content">Content:</label>
    {!! Form::textarea('content', null, ['id' => 'editor']) !!}
    <button type="submit">Add News</button>
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
