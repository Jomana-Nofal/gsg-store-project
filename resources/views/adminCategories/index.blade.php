@extends('layauts.admin')

@section('title', 'All Category')

@section('pageTitle', 'Diaplay All Category')

@section('status')
  @if (session('status'))
      <x-alert>
          <p>
          {{ session('status') }}
        </p>
      </x-alert>
      
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
      <th>{{__('image')}}</th>
      <th>{{__('Name')}}</th>
      <th>{{__('Discription')}}</th>
      <th>{{__('Satatus')}}</th>
      <th>{{__('Slug')}}</th>
      <th>{{__('Edit')}}</th>
      <th>{{__('Delete')}}</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td><img src="{{asset('images/'. $category->image_path)}}" width="60" height="60" alt=""></td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->discription }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->slug }}</td>
                <td><button class="btn btn-sm btn-primary"><a href="{{route('categories.edit',$category->id)}}">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:white;"></span></a></button></td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" id="{{$category->id}}">
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
        <h5 class="modal-title" id="exampleModalLongTitle">{{__('Delete Confirmation')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{__('Do You Need To Delete This Category ...!')}}
      </div>
      <div class="modal-footer">
      
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
        </form> 
        
      </div>
    </div>
  </div>
</div>


        
  


                   
                    
                
{{ $categories->links() }}
@endsection