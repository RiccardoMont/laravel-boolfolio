@extends('layouts.admin')

@section('content')


<h1 class="my-4">Categories</h1>
@include('partials.session-message')
<div class="d-flex flex-column flex-md-row">
    <div class="add-category col-md-3 me-4">
        <h3>Add new category</h3>
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" />
                <small id="helpId" class="form-text text-muted">Type a category name</small>
            </div>
            <button class="btn btn-primary" type="submit">Add New Category</button>
        </form>
    </div>
    <table class="table table-striped col">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Total Projects</th>
            <th>Actions</th>
        </tr>
        @forelse($categories as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->slug}}</td>
            <td>{{$cat->projects->count()}}</td>
            <td><a href="{{route('admin.categories.edit', $cat)}}"><i class="fa-solid fa-pencil text-secondary"></i></a>
                <i class="fa-solid fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#{{$cat->id}}"></i>
                <!-- Modal -->
                <div class="modal fade" id="{{$cat->id}}" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete project</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this category permanently?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <form action="{{route('admin.categories.destroy', $cat)}}" method="post">
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
            <td>No category here</td>
        </tr>
        @endforelse
    </table>

</div>




@endsection


<style type="text/css">
    i {
        margin-left: 5px;
        cursor: pointer;
        opacity: 0.5;
    }

    i:hover {
        opacity: 1;
    }
</style>