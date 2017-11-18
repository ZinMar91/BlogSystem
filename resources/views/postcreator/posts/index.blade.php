@extends('layouts.master')
@section('title','Posts | All')
@section('content')
  <div class="container">
      <div class="col-md-8 col-md-offset-2">
          <div class="well well bs-component">
            @if ($auth_check)
              <a href="{{ url('postcreator/posts/create') }}" class="btn btn-primary pull-right">Create New Post</a>
              <div class="clearfix"></div>
              <hr>
            @endif
            <div class="bs-component">
              <table class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  @if ($auth_check)
                    <th></th>
                  @endif
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td><a href="{{ action('PostCreator\PostController@show', $post->id) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->content }}</td>
                      @if ($auth_check)
                        <td class="text-center"><a href="{{ action('postcreator\PostController@edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
