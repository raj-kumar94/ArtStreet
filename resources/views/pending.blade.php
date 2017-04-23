@extends('layouts.app')

@section('content')
<br><br><br>

<h1 class="text-center">Your Pending Requests</h1>

@if(!$pending)
    <h3 class="text-center">no pending request</h3>


@else
    <div class="row">
        @foreach($pending as $friend)
        <div class="text-center panel panel-default col-md-6 col-md-offset-3">
            <img src="{{$friend->avatar}}" alt="" height="70px" width="70px">
            <a href="{{route('profile', ['slug'=>$friend->slug])}}">
            {{$friend->name}}</a>
        </div>

    @endforeach
    </div>
@endif