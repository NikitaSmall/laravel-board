@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Outcoming messages: </div>

                <div class="panel-body">
                    @foreach($messages as $message)
                        <a href="{{ route('details', $message->id) }}"> {{ $message->title }} </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
