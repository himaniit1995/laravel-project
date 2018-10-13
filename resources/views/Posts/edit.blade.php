@extends('layouts.defaults')

@section('content')

<h2>Edit Post! </h2>
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
    <form method="post" action="{{action('PostController@update', $user->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label>Post Title</label>
            <input type="text" name="post_title" value="{{ $user->title }}" class="form-control" placeholder="Post Title">
        </div>
        <div class="form-group">
            <label>Post Content</label>
            <textarea name="post_content" rows="4" class="form-control">{{ $user->body }}</textarea>
        </div>

         <div class="form-group">
            <label>Post Image</label>
        <input type="file" class="form-control" name="post_image">
        </div>

        <a href="" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @stop