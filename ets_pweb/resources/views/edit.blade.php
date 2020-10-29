@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$task->id}}">
        <div class="form-group">
            <h3>Edit Task</h3>
            <input type="text" name="task" class="form-control" value="{{$task->TaskName}}">
            <input type="date" name="taskDate" class="form-control" value="{{$task->deadline}}">
        </div>
        <div>
            <tags-div></tags-div>
        </div>

        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tags
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach($tags as $key => $tag)
                <a class="dropdown-item" href="{{ route('edit', $task->id) }}">{{ $tag->TagName }}</a>
                @endforeach
            </div>
        </div>
        <button class="btn btn-primary">Confirm Edit</button>
    </form>

</div>
@endsection