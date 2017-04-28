@extends('layouts.app')

@section('content')
<br><br><br>

<h1 class="text-center">Meet Your Friends</h1>

<div class="row">
    @foreach($friends as $friend)
    <div class="text-center panel panel-default col-md-6 col-md-offset-3">
        @if($friend->avatar)
            <img src="{{$friend->avatar}}" alt="" height="70px" width="70px">
        @endif
        <a href="{{route('profile', ['slug'=>$friend->slug])}}">
         {{$friend->name}}</a>
    </div>

    @endforeach
</div>