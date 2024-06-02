@extends('layouts.admin')

@section('content')



<div class="mt-4">
    <div class="d-flex justify-content-between">
        @if (Str::startsWith($project->cover_image, 'https://'))
        <img loading="lazy" class="rounded" width="100%" src="{{$project->cover_image}}" alt="">
        @else
        <img loading="lazy" class="rounded" width="50%" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @endif
        <div class="col-6 position-relative mx-4">
            <h3 class="text-uppercase fw-bold">{{$project->name}}</h3>
            <div class="metadata">
                <strong>Category:</strong>
                <em>{{$project->category ? $project->category->name : 'N/A'}}</em>
            </div>
            <p class="text-break">{{$project->description ?? 'N/A'}}</p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href="{{$project->project_url}}" target="_blank">Project Url</a>
                <a class="btn btn-primary" href="{{$project->source_code_url}}" target="_blank">Source Code Url</a>
            </div>
            <div class="position-absolute bottom-0 d-flex justify-content-between w-100">
                <div class="author">
                    <em>Id: {{$project->id}}</em>
                </div>
                <div class="project_id">
                    <em>Id: {{$project->id}}</em>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection