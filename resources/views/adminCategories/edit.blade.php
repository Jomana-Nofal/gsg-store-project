@extends('layauts.admin')
@section('title', 'Edit Category')

@section('pageTitle', 'Edit  Category')


@section('content')
<form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">     
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    

    <div class="form-group">
        <label for="categoryName">{{__('Category Name')}}</label>
        <input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name" 
        value="{{ old('name', $category->name) }}">
    </div>

    <div class="form-group">
        <label for="categoryDesc">{{__('Category Description')}}</label>
        <textarea class="form-control" name="discription" id="categoryDesc" placeholder="Enter Category Description">
        {{ old('discription', $category->discription) }}
        </textarea>
    </div>

    <div class="form-group">
        <label for="categoryImage">{{__('Category Image')}}</label>
        <input type="file" class="form-control" name="image" id="categoryImage"
        value="{{ old('image', $category->image) }}">

    </div>

    <div class="form-group">
        <label for="status">{{__('Status')}}</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status', $category->status) == 'active') checked @endif>
                <label class="form-check-label" for="status-active">
                {{__('Active')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status', $category->status) == 'draft') checked @endif>
                <label class="form-check-label" for="status-draft">
                {{__('Draft')}}
                </label>
            </div>
        </div>

    <div class="form-group">
        <button type="submit" class="btn btn-warning">Edit Category</button>
    </div>

</form>
@endsection