@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Advanced Search</div>
                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('search.service') }}">
                        <input type="text" name="title" placeholder="Search!" class="form-control search-input" id="search-line" autocomplete="false">
                        <div class="form-group">
                          <label>Deep search </label>
                          <input type="checkbox" name="deep" value="1" id="search-deep">
                        </div><br />
                        <div class="form-group">
                          <label>By user </label>
                          <input type="checkbox" name="user" value="1" id="search-user">
                      </div>
                <p class="pull-right">
                    <input type="submit" value="Search!" class="btn btn-primary">
                </p>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
