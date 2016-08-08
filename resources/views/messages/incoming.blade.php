@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Incoming messages: </div>

                <div class="panel-body">
                  <ul class="list-group" id="messages-list">
                    @foreach($messages as $message)
                    <li class="list-group-item message">
                        <a href="{{ route('details', $message->id) }}"> {{ $message->title }} </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="/js/messages.js"></script>
@endpush

@endsection
