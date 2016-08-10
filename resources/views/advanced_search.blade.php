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

                          <input type="checkbox" name="deep" value="1" id="search-deep">
                          <label>deep search </label>
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="user" value="1" id="search-user">
                          <label>search by user </label>
                      </div>
                </form>
                </div>
            </div>
            <div class="panel panel-primary" id="search-panel">
                <div class="panel-heading">Search results:</div>

                <div class="panel-body" id="search-results">
                    Start searching with filling the field before this panel!
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="/js/services.js"></script>
@endpush
@endsection
