@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <h3>New Task</h3>
            <input type="text" name="task" class="form-control">
        </div>
        <button class="btn btn-primary">Add Task</button>
    </form>

    <table class="table" style="margin-top: 50px;">
        <thead>
            <th>No.</th>
            <th>Task</th>
            <th>Deadline</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($taskList as $key => $task)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $task->TaskName }}</td>
                <td>
                    <a href="#">Add Time</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('edit', $task->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('delete', $task->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
