{{-- resources/views/contact/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Contact Us</h2>
        @if(session('message_sent'))
            <div class="alert alert-success" role="alert">
                {{ session('message_sent') }}
            </div>
        @endif
        <form action="/contact" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
