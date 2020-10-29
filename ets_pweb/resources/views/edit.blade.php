@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$task->id}}">
        <div class="form-group">
            <h3 id="tasktitle">Edit Task</h3>
            <input type="text" name="task" class="form-control" value="{{$task->TaskName}}">
            <input type="date" name="taskDate" class="form-control" value="{{$task->deadline}}">
        </div>

        <button id="btnsubmit"class="btn btn-primary">Confirm Edit</button>
    </form>

</div>
@endsection