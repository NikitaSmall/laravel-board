@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $message->title }} </div>
                <div class="panel-body">
                <p>{{ $message->body }}</p>
                <p class="pull-right">
                  <a href="{{ route('new_message', $message->user->id) }}" class="btn btn-primary">Reply</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
