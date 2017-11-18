@extends('layouts.admin')
@section('title','Admin | Users')
@section('content')
  <div class="col-md-9">
    <div class="well well bs-component">
      <table class="table table-bordered">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              {{-- <td><a href="{{ url('admin/users/'. $user->id .'/edit') }}">{{ $user->name }}</a></td> --}}
              <td><a href="{{ action('admin\UserController@edit', $user->id) }}">{{ $user->name }}</a></td>
              <td>{{ $user->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
