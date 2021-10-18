@extends('layauts.admin')

@section('title', 'Create New Product')

@section('pageTitle', 'Create New Product')

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
    @if (session('status'))
      <x-alert>
          <p>
          {{ session('status') }}
        </p>
      </x-alert>
      
  @endif
@endsection

@section('content')
<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image_path') }}">
            @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
        
            <label for="service-select">Choose Category:</label>

            <select name="category_id" id="service-select">
                <option value="">--Please choose an Category--</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->id}}</option>
                @endforeach
            </select>
                            
        </div>
        <!-- <div class="form-group">
        <label for="sku">Category_id</label>
            <input type="text" name="category_id" value="{{ old('category_id') }}" />
        </div> -->
        <div class="form-group">
        <label for="sku">sku</label>
            <input type="text" name="sku" value="{{ old('sku') }}" />
        </div>
        <div class="form-group">
        <label for="price">price</label>
            <input type="number" name="price" value="{{ old('price') }}"/>
        </div>
        <div class="form-group">
        <label for="sale_price">sale_price</label>
            <input type="number" name="sale_price" value="{{ old('sale_price') }}"/>
        </div>
        <div class="form-group">
        <label for="quantity">quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" />
        </div>
        <div class="form-group">
        <label for="weight">weight</label>
            <input type="number" name="weight" value="{{ old('weight') }}"/>
        </div>
        <div class="form-group">
        <label for="width">width</label>
            <input type="number" name="width"  value="{{ old('width') }}"/>
        </div>
        <div class="form-group">
        <label for="height">height</label>
            <input type="number" name="height" value="{{ old('height') }}"/>
        </div>
        <div class="form-group">
        <label for="length">length</label>
            <input type="number" name="length" value="{{ old('length') }}"/>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status') == 'active') checked @endif >
                    <label class="form-check-label" for="status-active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif >
                    <label class="form-check-label" for="status-draft">
                        Draft
                    </label>
                </div>
            </div>
            @error('status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
</form>
@endsection