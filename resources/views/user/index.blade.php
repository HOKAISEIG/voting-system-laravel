@extends("layouts.app")
@section("content")
    @foreach ($polls as $Poll)
        <div>
         
            <a href="{{  route('user.show_poll', $Poll) }}">{{ $Poll->poll_body }}</a>
        </div>
    @endforeach
@endsection