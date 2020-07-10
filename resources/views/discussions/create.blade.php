@extends('layouts.app')
@section('title')
    create discussion
@endsection
@section('content')
<div class="card">
    <div class="card-header">create Disscusion </div>

    <div class="card-body">
        <form action="{{ route("discussion.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title"> title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-controll">
                <label for="content"> content</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="channel"> channel</label>
                <select class="form-control" name="channel" id="channel">
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>
                <input type="submit" value="save" class="btn btn-primary my-2">
            
        </form>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" defer></script>
@endsection