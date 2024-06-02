@extends('layouts.admin')

@section('content')

@include('partials.errors')

<h1 class="fw-bold my-4">Insert a new project</h1>

<form class="mt-4" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label fs-5 fw-bold">Name</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="name" id="name" value="{{old('title')}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label fs-5 fw-bold">Cover Image</label>
        <input type="file" class="form-control border-3 border-dark-subtle" name="cover_image" id="cover_image" placeholder="cover_image" aria-describedby="coverImageHelper">
        <div id="coverImageHelper" class="form-text">Upload a cover image for this project</div>
        @error('cover_image')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label fs-5 fw-bold">Category</label>
        <select class="form-select form-select-lg" name="category_id" id="category_id">
            <option selected>Select one</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label fs-5 fw-bold">Description</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="description" id="description" rows="6" cols="100">{{old('description')}}</textarea>
        @error('description')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="project_url" class="form-label fs-5 fw-bold">Project Url</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="project_url" id="project_url" size="100" value="{{old('project_url')}}">
        @error('project_url')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="source_code_url" class="form-label fs-5 fw-bold">Source code Url</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="source_code_url" id="source_code_url" size="100" value="{{old('source_code_url')}}">
        @error('source_code_url')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <button class="btn btn-primary my-4" type="submit">Create</button>
</form>



@endsection