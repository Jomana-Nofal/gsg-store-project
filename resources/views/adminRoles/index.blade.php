@extends('layauts.admin')

@section('title', 'All Roles')

@section('pageTitle', 'All Roles')

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

<table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                   
                    <button type="submit" class="btn btn-sm btn-primary">
                        <a href="{{ route('roles.edit', $role->id) }}" style="color:white;">Edit</a>
                    </button>    
                    
                </td>
                   
                <td>
                
                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection