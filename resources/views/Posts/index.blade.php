
@extends('layouts.defaults')

@section('content')
    <div class="row">
        <a href="{{url('create')}}" class="btn btn-success pull-right">Create Post</a>
    </div>
    <br>
    @if (Session::get('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
 
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 
                 @foreach($post as $posts)

                <tr>
                    <td>{{ $posts->id }}</td>
                    <td>{{ $posts->title }}</td>
                    <td>{{ $posts->body }}</td>
                    <td><img src="{{ asset($posts->image) }}" height="100" width="100"></td>

                    <td style="width: 10%">
                        <form action="{{action('CommentsController@store')}}" method="POST">
                               {{ csrf_field() }}

                           <input type="hidden" class="form-control" name="post_id" value="{{$posts->id }}"/>

                           <input type="text" class="form-control" name="comment"/> &nbsp;&nbsp;&nbsp;

                           <br>

                           <input type="submit" class="btn btn-danger" value="save"/>
                        </form>
                    </td>
                    <td style="width: 10%">
                        <a href="{{action('PostController@show',$posts->id)}}" class="btn btn-success" style="margin-bottom: 10px; width: 70px;">View</a><br>
                        <a href="{{action('PostController@edit',$posts->id)}}" class="btn btn-info" style="margin-bottom: 10px; width: 70px;">Edit</a>
 
                     <form action="{{action('PostController@destroy',$posts->id)}}" method="GET">
                             
                           <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
           
        </table>

        {{ $post->links() }} 
        
 
    </div>
 
@stop