@extends('layauts.admin')

@section('title', 'All Category')

@section('pageTitle', 'Diaplay All Category')



@section('content')

<table class="table table-bordered">
  <thead>
    <tr>
      <th >#</th>
      <th >Name</th>
      <th >Discription</th>
      <th >Satatus</th>
      <th >Slug</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->descripton }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->slug }}</td>
            </tr>
            @endforeach

  </tbody>
</table>
@endsection