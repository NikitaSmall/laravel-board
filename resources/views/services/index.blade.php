@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">List of Services</h3>
                    @if(Auth::user())
                        <div class="pull-right">
                            <a class="btn-sm btn-success" href="{{ route('services.create') }}"><i class="fa fa-btn fa-plus" ></i>New service</a>
                        </div>
                    @endif
                    </div>
                    <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                  <td style="width:20%;">Date</td>
                                  <td>Title</td>
                                  <td>Author</td>
                            </tr>
                        </thead>
                        @foreach($services as $service)
                        <tr class="service">
                            <td><time>{{ date('F d, Y', strtotime($service->created_at)) }}</time></td>
                            <td><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></td>
                            <td><a href='' class="author">{{ $service->name }}</a></td>
                        </tr>
                        @endforeach
                    </table>
                   </div>
                   </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="/js/services.js"></script>
@endpush

@endsection
