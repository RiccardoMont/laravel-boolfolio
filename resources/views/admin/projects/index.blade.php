@extends('layouts.admin')

@section('content')


<div class="d-flex justify-content-between align-items-center my-4">
    <h1>Project</h1>
    <a role="button" class="btn btn-primary rounded" href="{{route('admin.projects.create')}}">Add New Project</a>
</div>
@include('partials.session-message')

<table class="table table-striped my-5">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Technologies</th>
        <th>Name</th>
        <th>Cover Image</th>
        <th>Description</th>
        <th>Project</th>
        <th>Source code</th>
        <th>Actions</th>
    </tr>
    @forelse($projects as $project)
    <tr>
        <!--ID-->
        <td>{{$project->id}}</td>
        <!--CATEGORIES-->
        <td>
            {{$project->category ? $project->category->name : 'N/A'}}
        </td>
        <!--TECHS-->
        <td>
            @include('partials.pills')
        </td>
        <!--NAME-->
        <td>{{$project->name}}</td>
        <!--IMAGE-->
        <td>
            @if (Str::startsWith($project->cover_image, 'https://'))
            <a href="{{route('admin.projects.show', $project)}}">
                <img loading="lazy" width="120px" src="{{$project->cover_image}}" alt="">
            </a>
            @else
            <a href="{{route('admin.projects.show', $project)}}">
                <img loading="lazy" width="120px" src="{{asset('storage/' . $project->cover_image)}}" alt="">
            </a>
            @endif
        </td>
        <!--DESCRIPTION-->
        <td>{{$project->description}}</td>
        <!--PROJECT_URL-->
        <td>{{$project->project_url}}</td>
        <!--SOURCE_CODE_URL-->
        <td>{{$project->source_code_url}}</td>
        <!--ACTIONS-->
        <td class="col-1">
            <a href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pencil text-secondary"></i></a>
            <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye text-primary"></i></a>
            <i class="fa-solid fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#{{$project->id}}"></i>
            <!-- Modal -->
            <div class="modal fade" id="{{$project->id}}" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete project</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this project permanently?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td>No project here</td>
    </tr>
    @endforelse
</table>


<!--$projects->links('pagination::bootstrap-5')-->




@endsection


<style type="text/css">
    img {
        cursor: pointer;
    }

    i {
        margin-left: 5px;
        cursor: pointer;
        opacity: 0.5;
    }

    i:hover {
        opacity: 1;
    }
</style>