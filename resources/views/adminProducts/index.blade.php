@extends('layauts.admin')

@section('title', 'Product index')

@section('pageTitle', ' Product index')

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
<h3>Products</h3>
<table class="table">
        <thead>
            <tr>
                <th>Pro.image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><img src="" width="60" alt=""></td>
                <td>{{ $product->name }}</td>
                <td> </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
          

                <td>
                    <form action="{{route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
               
                </td> 

                <td>
                    <button class="btn btn-sm btn-primary"><a href= "{{route('product.edit', $product->id) }}" style="color:white;"> Edit</a></button>
                 
                </td>
                
             
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection