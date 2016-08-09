@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(!Auth::user())
            <div class="panel panel-default hidden-xs">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                  <p>Welcome to laravel board project.</p>
                  <p>You must be <a href="{{ url('/register') }}">registered</a> and <a href="{{ url('/login') }}">logged in</a> to post your services here.</p>
                </div>
            </div>
            @endif
            <div class="panel panel-primary">
              <div class="panel-heading clearfix">
              <h3 class="panel-title pull-left">Last of Services</h3>
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
                <div class="panel-footer">
                  <div class="row text-right more">
                    <a href="{{ url('/services') }}">More >></a>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-search" aria-hidden="true"></i> Search</div>

                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('search.service') }}">
                        <input type="text" name="title" placeholder="Search!" class="form-control search-input" id="search-line" autocomplete="false">
                        <input type="submit" value="Search!" class="btn btn-default"><a href="{{ url('/search/advanced') }}">Advanced Search</a>
                    </form>
                </div>
            </div>

            <div class="panel panel-primary" id="search-panel">
                <div class="panel-heading">Search results:</div>

                <div class="panel-body" id="search-results">
                    Start searching with filling the field before this panel!
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">Top 5 rated users</div>

                <div class="panel-body" id="search-results">
                    List of top rated users
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
