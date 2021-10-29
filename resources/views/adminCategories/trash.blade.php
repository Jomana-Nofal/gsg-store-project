@extends('layauts.admin')

@section('title', 'Trashed Categoy')

@section('pageTitle', 'Trashed Categoy')

<style>
  .delete{
    background-color: #d14949;
    color: white;
    padding: 3px 6px;
  }
  .restore{
    background-color: #498dd1;
    color: white;
    padding: 3px 6px;
  }
  </style>
@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Discription</th>
      <th>Satatus</th>
      <th>Slug</th>
      <th>Force Delete</th>
      <th>Restore</th>
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
                <td>
                  <form method="post" action="{{route('category.forceDelete', $category->id)}}">
                    @csrf
                    <button type="submit" class="delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>      
                  </form>
                </td>

                  <td>
                  <form  action="{{route('category.restore',$category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="restore"><span class="glyphicon glyphicon-repeat"></span> Restore</button>           
                  </form>
                
                  </td>
            </tr>

            @endforeach

  </tbody>
</table>

<br>
<br>
{{ $categories->links() }}
@endsection