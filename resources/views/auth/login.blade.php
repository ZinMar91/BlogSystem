@extends('layouts.master')
@section('title','User | Login')
@section('content')
  <div class="container col-md-8 col-md-offset-2">
      <div class="well well bs-component">
          <form method="post">
              {{ csrf_field() }}
              <legend>User Login</legend>
              @foreach($errors->all() as $error)
                  <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember"> Remember Me
                  </label>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Login</button>
              <div class="clearfix"></div>
          </form>
      </div>
  </div>
@endsection
