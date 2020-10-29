@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ModalCenter">New tag</button>
    <h3>Edit Tag</h3>
    @foreach($tag_task as $key => $tt)
        <div>{{$key+1}}. {{ $tt->TagName }}</div>
    @endforeach
    <form action="{{ route('changeTag') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$task->id}}">
        <div class="form-group">
            <h5 class="mt-3">Available Tag(s) list:</h5>
            <select name="tag">
                @foreach($tags as $key => $tag)
                    <option value="{{ $tag->id }}">{{ $tag->TagName }}</option>
                @endforeach

            </select>
            <button class="btn btn-primary">Add Tag</button>
        </div>
    </form>


    <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>

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
                        <button class="btn btn-primary mt-3">Add New Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection