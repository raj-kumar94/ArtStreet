@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><p class="text-center">
                        {{$user->name}}'s Profile.
                    </p></b>
                </div>
                <div class="panle-body">
                    <center>
                        <img src="{{$user->avatar}}" width="80px" height="80px" style="border-radius: 50%">
                    </center>

                    <br>
                    <p class="text-center">{{$user->profile->location}}</p>

                    <p class="text-center">
                        @if(Auth::id()==$user->id)
                            <a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">Edit Your Profile</a>
                        @endif
                    </p>
                </div>
            </div>

            @if(Auth::id()!=$user->id)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <friend :profile_user_id="{{ $user->id }}"></friend>
                    </div>
                </div>
            @endif



            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        About me
                    </p>
                </div>
                <div class="panle-body">
                    <p class="text-center">
                        {{$user->profile->about}}
                    </p>
                </div>
            </div>

        </div>
    </div>
@stop