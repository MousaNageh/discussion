@extends('layouts.app')
@section('title')
    disscussions
@endsection
@section('content')
    @foreach ($discussions as $discussion)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ Gravatar::src($discussion->author->email) }}" style="width=40px ; height:40px; border-radius:50%">
                    <span> <strong>{{ $discussion->author->name}} </strong></span>
                </div>
                <div>
                <a href="{{ route("discussion.show",$discussion->slug) }}" class="btn btn-success btn-sm">view</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="h4 text-center">{{ $discussion->title }} </h2>

        </div>
    </div>
    @endforeach
{{ $discussions->links() }}
@endsection
