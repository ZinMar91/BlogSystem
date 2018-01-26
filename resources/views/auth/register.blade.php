@extends('layouts.master')

@section('title','User | Register')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <form method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <legend>User Registration</legend>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
