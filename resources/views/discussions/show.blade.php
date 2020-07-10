@extends('layouts.app')
@section('title')
    {{ $discusion->title }}
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ Gravatar::src($discusion->author->email) }}" style="width=40px ; height:40px; border-radius:50%">
                    <span > <strong>{{ $discusion->author->name}}</strong></span>
                </div>
                <div>
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="h4 text-center border-bottom " style="padding:10px">{{ $discusion->title }} </h2>
            {!! $discusion->content !!}
        </div>
    </div>
@endsection
