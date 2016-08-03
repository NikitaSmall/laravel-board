@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New service: </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="title" class="form-control" placeholder="Service's title" type="text">

                        <input type="text" name="description" placeholder="Service's description" class="form-control">

                        <label>Service's Photo</label>
                        <input type="file" name="photo">

                        <select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="Create service">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
