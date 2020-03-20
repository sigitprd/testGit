@extends('layouts-traveller.main')

@section('title', 'Your Messages | VELO')

@section('content')
<div class="mt-2"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="user-wrapper mt-2">
                @if($users->count())
                <ul class="users">
                    @foreach($users as $user)
                    <li class="user" id="{{ $user->id }}">
                        @foreach($notifs as $notif => $value)
                        <!-- will show unread count notiffication -->
                            @if($user->id == $value->from && $value->to == auth()->user()->id)
                                @if($value->is_read == 0)
                                <span class="pending"></span>
                                @endif
                            @endif
                        @endforeach
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('/assets/pic/profilepic/'.$user->photo) }}" width="64" height="64" class="rounded-circle">
                            </div>

                            <div class="media-body">
                                <p class="name">{{ $user->name }}</p>
                                <p class="email">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                    </li>
                    @endforeach
                </ul>
                @else
                <h1>Nothing</h1>
                @endif
            </div>
        </div>

        <div class="col-md-8" id="messages">
           
        </div>
    </div>
</div>


@endsection