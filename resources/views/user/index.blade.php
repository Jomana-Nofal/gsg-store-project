@extends('layauts.admin')

@section('title', 'Create New Product')

@section('pageTitle', ' Product Index')

@section('status')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
<div class="container">
<h3>Products</h3>
</br>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 text-center" style="border: solid 1px #cec8c8; padding: 10px;height:340px;">
    
        <image style="border-radius: 100px; margin-bottom: 15px;" src="{{asset('adminAssets/img/ui-sam.jpg') }}"/>
        <div id="product-name">
            <span>{{$product->name}}</span>
        </div>
        <div id="product-desc" style="margin-bottom:10px;">
            <p>{{$product->description}}</p>
        </div>
        <div>
            
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection