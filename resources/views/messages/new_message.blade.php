@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">New message </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('create_message') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="rec_id" value="{{ $rec_id }}">

                        <input type="text" name="title" class="form-control" placeholder="Title">
                        <input type="text" name="body" class="form-control" placeholder="Body">

                        <input type="submit" value="Send a message!" class="btn btn-primary pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
