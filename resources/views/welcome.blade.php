@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    <a href="{{ route('services.index') }}">To the services</a>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('search.service') }}">
                        <input type="text" name="title" placeholder="Search!" class="form-control" id="search-line" autocomplete="false">
                        <div class="form-group">
                            <label>Deep search: </label>
                            <input type="checkbox" name="deep" value="1" id="search-deep">
                        </div>
                        <input type="submit" value="Search!" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search results:</div>

                <div class="panel-body" id="search-results">
                    Start searching with filling the field before this panel!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
