@extends('layouts.master')
@section('title','Posts | Single')
@section('content')
  <style media="screen">
    .user-name {font-weight: bold; padding-right: 10px;}
  </style>
  <div class="container">
      <div class="col-md-8 col-md-offset-2">
          <div class="well well bs-component">

            <div class="panel panel-primary">
              <div class="panel-heading">{{ $post->title }}</div>
              <div class="panel-body">
                {{ $post->content }}
              </div>
            </div>

            @foreach ($comments as $comment)
              <p class="alert alert-info">
                <span class="user-name">
                  {{ $comment->user->name }} :
                </span>
                {{ $comment->content }}
              </p>
            @endforeach

            @if (session('status'))
              <p class="alert alert-success">{{ session('status') }}</p>
            @endif

            @if (Auth::check())
              <div class="panel panel-info">
                <div class="panel-heading">Insert Your Comment :</div>
                <div class="panel-body">
                  <form method="post" action="{{ url('comment/create') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="commendable_id" value="{{ $post->id }}">
                      <input type="hidden" name="commendable_type" value="App\Models\Post">
                      <textarea name="content" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            @endif

          </div>
        </div>
      </div>
@endsection
