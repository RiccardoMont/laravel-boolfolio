@extends('layouts.admin')

@section('content')



<form action="{{route('admin.technologies.update', $technology)}}" method="post" class="my-4">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="name" class="form-label fs-5 fw-bold">Name</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="name" id="name" value="{{old('name', $technology->name)}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label fs-5 fw-bold">Slug</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="slug" id="slug" value="{{old('slug', $technology->slug)}}" disabled>
        @error('slug')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="total_project" class="form-label fs-5 fw-bold">Total projects</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="total_project" id="total_project" value="{{$technology->projects->count()}}" disabled>
    </div>
    <button class="btn btn-primary" type="submit">Modify</button>
</form>




@endsection