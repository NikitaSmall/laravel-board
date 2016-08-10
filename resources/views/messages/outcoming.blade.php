@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Outcoming messages: </div>
                <div class="panel-body">
                  <table class="table table-condensed">
                      <thead>
                          <tr>
                                <td style="width:20%;">Date</td>
                                <td>To</td>
                                <td>Title</td>
                          </tr>
                      </thead>
                      @foreach($messages as $message)
                      @if($message->new)
                      <tr class="message info">
                      @else
                      <tr class="message">
                      @endif
                          <td><time>{{ date('F d, Y / H:m', strtotime($message->created_at)) }}</time></td>
                          <td>{{ $message->name }}</td>
                          <td><a href="{{ route('details', $message->id) }}"> {{ $message->title }} </a></td>
                      </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
