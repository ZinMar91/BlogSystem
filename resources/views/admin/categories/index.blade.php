@extends('layouts.admin')
@section('title','Roles | Index')
@section('content')
  <div class="col-md-9">
    <a href="{{ url('admin/categories/create') }}">
      <button type="button" class="btn btn-primary pull-right">Create Category</button>
      <div class="clearfix"></div>
    </a>
    <hr>
    <div class="well well bs-component">
      <table class="table table-bordered">
        <thead>
          <th>Category ID</th>
          <th>Category Name</th>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td><a href="{{ action('admin\CategoryController@edit', $category->id) }}">{{ $category->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
