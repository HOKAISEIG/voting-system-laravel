@extends('layouts.app')
@section('content')

    Add options to your poll->
    <h1>{{ $poll->body }}</h1>
    <form action="{{ route('admin.add_option') }}" method ="post">
        @csrf
        <input type="hidden" name="poll_id" value={{ $poll->id }}>
        <div class="form-group">
            <label for="option">Enter a option</label>
            <input name="option_body" placeholder="Type here">
        </div>
        <button type="submit">Sumbmit</button>
        <a href="{{ route('admin.home') }}" class="btn btn-">done</a>
    </form>

@endsection