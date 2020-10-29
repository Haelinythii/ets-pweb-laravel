@extends('layouts.app')

@section('content')
<div class="container">
    <h3 id="tasktitle">Archieved Task</h3>
    <table id="headtable" class="table" style="margin-top: 10px;">
        <thead>
            <th>No.</th>
            <th>Task</th>
            <th>Deadline</th>
            <th></th>
        </thead>
        <tbody id="bodytable">
            @foreach($taskList as $key => $task)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $task->TaskName }}</td>
                <td>
                    @if(!is_null($task->deadline))
                    <div>{{ $task->deadline }}</div>
                    @endif
                </td>
                <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="btnsubmit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a id="btndrop" class="dropdown-item" href="{{ route('unarchievedTask', $task->id) }}">Undo Archieve</a>
                    <a id="btndrop" class="dropdown-item" href="{{ route('deleteArchieved', $task->id) }}">Delete</a>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a id="btnsubmit" class="btn btn-secondary" href="{{ route('home') }}">Back</a>
</div>
@endsection
