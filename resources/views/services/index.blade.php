@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Auth::user())
                <div class="panel panel-default">
                    <div class="panel-heading">Utils: </div>

                    <div class="panel-body">
                        <a class="btn btn-info" href="{{ route('services.create') }}">New service</a>
                    </div>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Services: </div>

                <div class="panel-body">
                    <ul class="list-group" id="service-list">
                        @foreach($services as $service)
                            <li class="list-group-item service">
                                <a href="{{ route('services.show', $service->id) }}"> {{ $service->title }} </a>
                            </li>
                        @endforeach
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="/js/services.js"></script>
@endpush

@endsection
