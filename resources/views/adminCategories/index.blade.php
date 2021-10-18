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
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:white;"></span> </a> {{__('Edit')}}</button></td>

                <td>

                  <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return ConfirmDelete()">
                     @csrf
                     @method('delete')
                     <button type="submit" class="btn btn-danger" onClick="d()"><span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:white;"></span> {{__('Delete')}} </button>
                  </form> 
                 
                </td>
            </tr>

            @endforeach

  </tbody>
</table>
        

    <script type="text/javascript">
    function ConfirmDelete()
    {
        return confirm("are you sure ?");
    }

  </script>


                   
                    
                
{{ $categories->links() }}
@endsection