@extends('layouts.app')

@section('content')
@if(session()->has('sucess'))
    <div class="alert alert-success">
        {{ session()->get('sucess') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome give ur opinion.') }}
                    <a href="{{  route("user.show_index")}}">See polls</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
