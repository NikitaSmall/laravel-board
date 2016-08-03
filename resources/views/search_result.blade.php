@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search result</div>

                <div class="panel-body">
                    @foreach($services as $service)
                        <a href="{{ route('services.show', $service->id) }}"> {{ $service->title }} </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
