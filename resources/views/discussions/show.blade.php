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
            @if ($discusion->bestReply)
                <div class="alert alert-success">
                    <h4 class="text-center">best reply</h5>

                    <div class="card">
                        <div class="card-header">
                            <div class=" font-weight-bold">
                                <img src="{{ Gravatar::src($discusion->bestReply->owner->email) }}" style="width=40px ; height:40px; border-radius:50%">
                                {{ $discusion->bestReply->owner->name}}
                            </div>
                            <div class="card-body">
                                {!! $discusion->bestReply->content   !!}
                                <div class=" font-italic font-weight-bold">
                                    replied at : {{   $discusion->bestReply->created_at  }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($replies->count()>0)
                <div class="crad" style="padding-bottom: 6px" >
                    <div class="card-header">
                        @if ($discusion->bestReply)
                        <h3 class="text-center">read more replies</h3>
                        @else
                        <h3 class="text-center">read  replies</h3>
                        @endif

                    </div>
                    <div class="card-body">
                        @foreach ($replies as $reply)
                            <div class="alert alert-success">
                                <div class="d-flex justify-content-between">
                                    <div class=" font-weight-bold">
                                        <img src="{{ Gravatar::src($reply->owner->email) }}" style="width=40px ; height:40px; border-radius:50%">
                                        {{ $reply->owner->name}}
                                    </div>
                                    <div>
                                        @if (auth()->user()->id==$discusion->user_id)
                                        <form action="{{ route('discussion.reply.bestReplay',['discussion'=>$discusion->slug,'reply'=>$reply->id]) }}" method="POST">
                                            @csrf
                                            <input type="submit" value="make it a best reply" class="btn btn-secondary btn-sm">
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="my-4 font-italic">
                                    {!! $reply->content !!}
                                </div>
                                <div class=" font-italic font-weight-bold">
                                replied at : {{   $reply->created_at  }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $replies->links() }}
                </div>
            @endif
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
                    <label for="content"> reply</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
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
