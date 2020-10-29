@extends('layouts.app')

@section('content')
<div class="container">
    <h3 id="tasktitle">Edit Tag</h3>
    <div class="row">
    
    <div class="col-sm-7">
    <form action="{{ route('changeTag') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$task->id}}">
        <div class="form-group">
            <h5 class="mt-3">Choose The Tag!</h5>
            <select name="tag" id="taglist" >
                @foreach($tags as $key => $tag)
                    <option value="{{ $tag->id }}">{{ $tag->TagName }}</option>
                @endforeach

            </select>
            <button id="btnsubmit" class="btn btn-primary">Add Tag</button>
            <button id="btnview" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">New tag</button>
        </div>
    </form>
    </div>

    <div id="avtaglist" class="col-sm-5">
    <h5 style="background-color:#fff568; padding-left:10px; padding-top:5px">Task's Tag</h5>
    @foreach($tag_task as $key => $tt)
        <div style="padding-left:10px">{{$key+1}}. {{ $tt->TagName }}</div>
    @endforeach
    </div>
    </div>

    <a id="btnsubmit" class="btn btn-secondary" href="{{ route('home') }}" style="margin-top: 20px;">Back</a>

    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCenterTitle">Add New Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeTag') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <h6>New Tag:</h6>
                            <input type="text" class="form-control" name="tag">
                        </div>
                        <button id="btnsubmit" class="btn btn-primary mt-3">Add New Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection