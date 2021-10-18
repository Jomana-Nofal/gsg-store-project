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
                <th>{{__('image')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Qty.')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Created At')}}</th>
                <th>{{__('Edit')}}</th>
                <th>{{__('Delete')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <td><img src="{{asset('images/'. $product->image_path)}}" width="60" height="60" alt=""></td>
                <td>{{ $product->name }}</td>
                <td><a href="{{route('category.product',$product->category->id)}}">{{$product->category->name}}</a> </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
          

                <td>
                    <form action="{{route('product.destroy', $product->id) }}" method="post" onsubmit="return ConfirmDelete()">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="d()">Delete</button>
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

<script type="text/javascript">
    function ConfirmDelete()
    {
        return confirm("are you sure ?");
    }
</script>