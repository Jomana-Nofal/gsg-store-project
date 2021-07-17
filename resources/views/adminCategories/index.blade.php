@extends('layauts.admin')

@section('title', 'All Category')

@section('pageTitle', 'Diaplay All Category')

@section('status')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@endsection

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
                <td><button class="btn btn-sm btn-primary"><a href="{{route('categories.edit',$category->id)}}">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:white;"></span></a></button></td>

                  <td><form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:white;"></span>
                    </button>
                </form></td>
            </tr>
            @endforeach

  </tbody>
</table>
{{ $categories->links() }}
@endsection