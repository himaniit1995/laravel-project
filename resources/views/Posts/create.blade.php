
@extends('layouts.defaults')
@section('content')

    <h3> Create new post! </h3>
    <hr>
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post"  enctype="multipart/form-data" action="{{action('PostController@store')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Post Title</label>
            <input type="text" class="form-control" name="post_title" placeholder="Post Title">
        </div>
        <div class="form-group">
            <label>Post Content</label>
            <textarea  rows="4" name="post_content" class="form-control"></textarea>
        </div>

         <div class="form-group">
            <label>Post Image</label>
           <input type="file" class="form-control" name="post_image" placeholder="Post Image">
        </div>

        <a href="{{url('index')}}" class="btn btn-default">Cancel</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop