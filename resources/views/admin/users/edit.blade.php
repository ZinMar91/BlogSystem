@extends('layouts.admin')
@section('title', 'Admin | Roles-create')
@section('content')
  <div class="col-md-9">
    <div class="well well bs-component">
      <form method="post">
          {{ csrf_field() }}
          <legend>Edit User Roles</legend>
          @if (session('status'))
            <p class="alert alert-success">{{ session('status') }}</p>
          @endif
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled>
          </div>
          <div class="form-group">
              <label for="name">Email</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $user->email }}" disabled>
          </div>
          <div class="form-group">
              <select class="form-control" name="role[]" multiple>
                @foreach ($roles as $role)
                  <option value="{{ $role->name }}" @if(in_array($role->name, $selected_roles)) selected @endif>{{ $role->name }}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Update</button>
          <div class="clearfix"></div>
      </form>
    </div>
  </div>
@endsection
