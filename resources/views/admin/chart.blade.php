@extends("layouts.app")
@section("content")
<h1>Total votes: {{ $totalVotes }}</h1>
    @for ($i = 0; $i < (count($label)); $i++)

        <div>
           <h1>Option name:{{ $label[$i] }}</h1>
          
            
            <h1>Votes:{{ $var[$i] }}</h1>
          
            
        </div>
    @endfor
@endsection