@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">Services by user</div>
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
@endsection
