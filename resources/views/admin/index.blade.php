@extends("layouts.app")
@section("content")
    @foreach ($polls as $Poll)
        <div>
           
            <a href="{{  route('user.show_poll', $Poll) }}">{{ $Poll->poll_body }}</a>
            <a href="#">Edit</a>
            <a href="#">Delete</a>
            <a href="{{  route('admin.show_stats', $Poll) }}">View stats</a>

        </div>
    @endforeach
@endsection