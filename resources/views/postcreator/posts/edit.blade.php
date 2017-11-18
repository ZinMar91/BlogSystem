@extends('layouts.master')
@section('title', 'Posts | Edit')
@section('content')
  <div class="container">
      <div class="col-md-8 col-md-offset-2">
          <div class="well well bs-component">
              <form method="post">
                  {{ csrf_field() }}
                  <legend>Create New Post</legend>
                  @foreach($errors->all() as $error)
                      <p class="alert alert-danger">{{ $error }}</p>
                  @endforeach
                  @if (session('status'))
                      <p class="alert alert-success">{{ session('status') }}</p>
                  @endif
                  {{-- <input type="hidden" name="user_id" value="{{ $post->user_id }}"> --}}
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}"
                        @if ($post->category_id === $category->id)
                          selected
                        @endif>
                        {{ $category->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="content">Content</label>
                      <textarea class="form-control" row="3" name="content" id="content">{{ $post->content }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Update</button>
                  <div class="clearfix"></div>
              </form>
          </div>
      </div>
  </div>
@endsection
