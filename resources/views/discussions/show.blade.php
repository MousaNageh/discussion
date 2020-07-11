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
    <div class="card my-3">
        <div class="card-header">
            <h4>add reply</h4>
        </div>
        <div class="card-body">
            @auth
            <form action="{{ route('reply.store',$discusion->slug)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="reply"> reply</label>
                    <input id="reply" type="hidden" name="reply">
                    <trix-editor input="reply"></trix-editor>
                </div>
                <div class="form-group">
                    <input type="submit" value="add replay" class="btn btn-success">
                </div>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary mb-2" style="width: 100%">login to Add reply</a>
            @endauth
        </div>
    </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" defer></script>
@endsection
