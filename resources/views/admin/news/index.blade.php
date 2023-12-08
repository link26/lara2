<!-- resources/views/admin/news/index.blade.php -->

@foreach($news as $item)
    <p>{{ $item->title }} - <a href="{{ route('news.edit', $item) }}">Edit</a></p>
@endforeach

<a href="{{ route('news.create') }}">Add News</a>
