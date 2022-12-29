@extends("layouts.app")
@section("content")
    <h1>{{ $poll->poll_body  }}</h1>
    
            

      
        <form action="{{ route('user.vote') }}" method="post">
            @csrf
            <input type="hidden" name="poll_id" value={{ $poll->id }}>

            <select name="option_id">
                <option value="" disabled selected>Choose option</option>
                @foreach ($poll->options as $option)
                    <option value="{{ $option->id }}">{{ $option->option_body}}</option>
                @endforeach
                
            </select>
           
            <input type="submit" >
        </form>
        
    </div>
@endsection