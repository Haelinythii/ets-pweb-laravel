@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Archieved Task</h3>
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
                    <a class="btn btn-success btn-sm" href="{{ route('unarchievedTask', $task->id) }}">Undo Archieve</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('deleteArchieved', $task->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-secondary mt-3" href="{{ route('home') }}">Back</a>
</div>
@endsection
