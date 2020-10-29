@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <h3 id="tasktitle">New Task</h3>
            <input type="text" name="task" class="form-control" placeholder="Add your task here!">
        </div>
        <button id="btnsubmit"class="btn btn-primary">Add Task</button> 
        <a id="btnview" class="btn btn-success" href="{{ route('viewArchieved') }}">View Archieved</a>
    </form>

   
    <table id="headtable" class="table" style="margin-top: 50px;">
        <thead >
            <th>No.</th>
            <th>Task</th>
            <th>Due Date</th>
            <th>Tag(s)</th>
            <th>Action</th>
        </thead>
        <tbody id="bodytable">
            @foreach($taskList as $key => $task)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $task->TaskName }}</td>
                <td>
                    @if(is_null($task->deadline))
                    <a id="link" href="{{ route('edit', $task->id) }}">Add Time</a>
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
                <td><a id="link" href="{{ route('editTag', $task->id) }}">Add Tags</a></td>
                <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="btnsubmit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a id="btndrop" class="dropdown-item" href="{{ route('edit', $task->id) }}">Edit</a>
                    <a id="btndrop" class="dropdown-item" href="{{ route('archieveTask', $task->id) }}">Archieve</a>
                    <a id="btndrop" class="dropdown-item" href="{{ route('deleteTask', $task->id) }}">Delete</a>
                    </div>
                </div>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




    
</div>
@endsection