@extends('layouts.app')

@section('content')
    <h1>Add polls</h1>
    <form action="{{ route('admin.create_poll') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="poll">Input your poll question -</label>
            <input name="poll_body" placeholder="please input your text here"> 
        </div>
        <div class="form-group">
            <label for="date">Input end date -</label>
            <input type="date" name="poll_end_date"> 
        </div>
        
        <button type='submit' class= "btn btn-success">Submit</button>

    </form>
@endsection