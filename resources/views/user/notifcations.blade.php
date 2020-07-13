@auth
@extends('layouts.app')
@section('title')
    notifcations
@endsection
@section('content')

<div class="card">
    <div class="card-header">notifcations</div>
    <div class="card-body">

            <ul class="list-group ">
                @foreach ($notifications as  $notification)
                @if($notification->type=="App\Notifications\NewReplyAdded")
                <li class="list-group-item">
                    you have  a new reply on  <strong style="color: rgb(0, 128, 111)" >{{ $notification->data["discussion"]["title"] }}</strong>
                    <a href="{{ route("discussion.show",$notification->data["discussion"]["slug"]) }}" class="btn btn-info float-right btn-sm"> view reply</a>
                </li>
                @endif
                @if($notification->type=="App\Notifications\ReplayAsbestReply")
                <li class="list-group-item">
                    you replay on  <strong style="color: rgb(0, 128, 111)" >{{ $notification->data["bestReply"]["title"] }}</strong> Discussion marked as best reply
                    <a href="{{ route("discussion.show",$notification->data["bestReply"]["slug"]) }}" class="btn btn-info float-right btn-sm"> view reply</a>
                </li>
                @endif
            @endforeach
            </ul>



    </div>
</div>

@endsection

@endauth
