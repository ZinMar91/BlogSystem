@extends('layouts.admin')
@section('title','Roles | Index')
@section('content')
  <div class="col-md-9">
    <a href="{{ url('admin/roles/create') }}">
      <button type="button" class="btn btn-primary pull-right">Create Role</button>
      <div class="clearfix"></div>
    </a>
    <hr>
    <div class="well well bs-component">
      <table class="table table-bordered">
        <thead>
          <th>Role ID</th>
          <th>Role Name</th>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
