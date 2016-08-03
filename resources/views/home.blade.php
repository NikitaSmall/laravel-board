@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard | {{ $weather->temp() }} </div>

                <div class="panel-body">
                    @if(Auth::user()->photo)
                    <div>
                        <img src="{{ Auth::user()->photo }}">
                    </div>
                    @endif

                    <a href="{{ route('incoming') }}">Incoming</a>
                    <br>
                    <a href="{{ route('outcoming') }}">Outcoming</a>

                    <form action="{{ route('update') }}" enctype="multipart/form-data" method="POST" >
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <input type="text" name="name" placeholder="User name" value="{{ Auth::user()->name }}">

                        <label>Update photo</label>
                        <input type="file" name="photo">

                        <input type="submit" value="Update" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
