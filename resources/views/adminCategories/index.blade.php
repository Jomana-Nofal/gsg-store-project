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

<div class="">
       
        <a class="btn btn-sm  btn-danger" href="{{ route('categories.trash') }}">
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:white;"></span>
         Trashed Category</a>
</div>
</br>

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

                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:white;"></span>
                    </button>
                  </td>
            </tr>

            @endforeach

  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#b21d15;">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do You Need To Delete This Category ...!
      </div>
      <div class="modal-footer">
      
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
        
      </div>
    </div>
  </div>
</div>


        
  


                   
                    
                
{{ $categories->links() }}
@endsection