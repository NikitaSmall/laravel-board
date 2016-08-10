@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">New service: </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <input name="title" class="form-control" placeholder="Service's title" type="text">
                        <input type="text" name="description" placeholder="Service's description" class="form-control">
                        <label class="btn btn-primary btn-file">
                        Upload Photo
                        <input type="file" style="display: none;" name="photo" onchange="$('#upload-file-info').html($(this).val());">
                        </label>
                        <span class='label label-default' id="upload-file-info"></span>
                        <input type="submit" class="btn btn-primary pull-right" value="Create service">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
