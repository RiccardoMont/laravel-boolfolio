@if ($errors->any())

<div class="alert alert-primary" role="alert">
    <strong>Errors</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif