@extends('layauts.admin')

@section('title', 'Trashed Categoy')

@section('pageTitle', 'Trashed Categoy')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Discription</th>
      <th>Satatus</th>
      <th>Slug</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->discription }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->slug }}</td>
                <td></td>

                  <td>
                    
                  </td>
            </tr>

            @endforeach

  </tbody>
</table>
@endsection