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

    <a class="btn btn-success" href="{{ route('viewArchieved') }}">View Archieved</a>
    <table class="table" style="margin-top: 50px;">
        <thead>
            <th>No.</th>
            <th>Task</th>
            <th>Due Date</th>
            <th>Tag(s)</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($taskList as $key => $task)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $task->TaskName }}</td>
                <td>
                    @if(is_null($task->deadline))
                    <a href="{{ route('edit', $task->id) }}">Add Time</a>
                    @else
                    <div>{{ $task->deadline }}</div>
                    @endif
                </td>
                <td>
                @foreach($tags as $key => $tag)
                    @if($task->id == $tag->task_id)
                        <a>{{$tag->TagName}}</a>
                        <a>|</a>
                    @endif
                @endforeach
                </td>
                <td><a href="{{ route('editTag', $task->id) }}">Add Tags</a></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('edit', $task->id) }}">Edit</a>
                    <a class="btn btn-success btn-sm" href="{{ route('archieveTask', $task->id) }}">Archieve</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('deleteTask', $task->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




    
</div>
@endsection