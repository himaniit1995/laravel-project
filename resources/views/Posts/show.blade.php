
@extends('layouts.defaults')
 
@section('content') 


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post Details </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Title:</strong>
                     {{$users->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>users Body:</strong>
                     {{$users->body}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Image:</strong>
                  <img src="{{ asset($users->image) }}" height="100" width="200">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
                <strong>Post Comments:</strong>
                <ol>
                  @foreach($users['comments'] as $key=>$comment)
                  
                    <li>{{$comment->commentbody}}</li>
                    @endforeach  
                 </ol>   
            </div>
          
        </div>

    </div>
 
@stop