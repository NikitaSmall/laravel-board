@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">Services by user</div>
                  <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                  <td>Date</td>
                                  <td>Title</td>
                            </tr>
                        </thead>
                        @foreach($services as $service)
                        <tr class="service">
                            <td><time>{{ date('F d, Y', strtotime($service->created_at)) }}</time></td>
                            <td><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
