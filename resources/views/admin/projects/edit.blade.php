@extends('layouts.admin')

@section('content')

<h1 class="fw-bold my-4">Edit {{$project->name}}</h1>

<form class="mt-4" action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label fs-5 fw-bold">Name</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="name" id="name" value="{{old('name', $project->name)}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3 d-flex">
        @if (Str::startsWith($project->cover_image, 'https://'))
        <img loading="lazy" class="me-4" width="200px" src="{{$project->cover_image}}" alt="">
        @else
        <img loading="lazy" class="me-4" width="200px" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @endif
        <div class="mb-3">
            <label for="cover_image" class="form-label fs-5 fw-bold">Cover Image</label>
            <input type="file" class="form-control border-3 border-dark-subtle" name="cover_image" id="cover_image" placeholder="cover_image" aria-describedby="coverImageHelper">
        </div>
        @error('cover_image')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label fs-5 fw-bold">Description</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="description" id="description" rows="6" cols="100">{{old('description', $project->description)}}</textarea>
        @error('description')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="project_url" class="form-label fs-5 fw-bold">Project Url</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="project_url" id="project_url" size="100" value="{{old('project_url', $project->project_url)}}">
        @error('project_url')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="source_code_url" class="form-label fs-5 fw-bold">Source code Url</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="source_code_url" id="source_code_url" size="100" value="{{old('source_code_url', $project->source_code_url)}}">
        @error('source_code_url')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <button class="btn btn-primary my-4" type="submit">Update</button>
</form>



@endsection