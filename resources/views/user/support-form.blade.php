@extends('layout.user_layout')

@section('content')
<div class="container">
    <h1>Support</h1>
    <form action="{{ route('support.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5" class="form-input" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection
