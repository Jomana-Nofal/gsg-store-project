@extends('layauts.admin')

@section('title', 'Create New Category')

@section('pageTitle', 'Create New Category')

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
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ csrf_field() }}
    @csrf

    <div class="form-group">
        <label for="categoryName">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryName" placeholder="Enter Category Name" name="name" value="{{ old('name')}}">
        
    </div>

    <div class="form-group">
        <label for="categoryDesc">Category Description</label>
        <textarea class="form-control" name="discription" id="categoryDesc" placeholder="Enter Category Description">
        {{ old('discription') }}
        </textarea>
    </div>

    <div class="form-group">
        <label for="">Category Image</label>
        <input type="file" class="form-control" name="image">
        @error('image')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status') == 'active') checked @endif>
                <label class="form-check-label" for="status-active">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif>
                <label class="form-check-label" for="status-draft">
                    Draft
                </label>
            </div>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-warning">Save Data</button>
    </div>

</form>
@endsection