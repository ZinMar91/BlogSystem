@extends('layouts.admin')
@section('title', 'Admin | Roles-create')
@section('content')
  <div class="col-md-9">
    <div class="well well bs-component">
      <form method="post">
          {{ csrf_field() }}
          <legend>Insert Category</legend>

          @foreach($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
          @endforeach

          @if (session('status'))
            <p class="alert alert-success">{{ session('status') }}</p>
          @endif
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Role Name">
          </div>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
          <div class="clearfix"></div>
      </form>
    </div>
  </div>
@endsection
