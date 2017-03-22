

<div class="media">

    @if(Auth::id()==$message->user->id)
        <a class="pull-right" href="#">
            <img src="{{$message->user->avatar}}"
                 alt="{{ $message->user->name }}" class="img-circle" height="30px" width="30px">
            {{--<img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"--}}
            {{--alt="{{ $message->user->name }}" class="img-circle">--}}
        </a>
        <div class="media-body">
            <p class="pull-right">{{ $message->body }}</p><hr>
                <small class="pull-right" style="font-size: x-small">{{ $message->created_at->diffForHumans() }}</small>
        </div>
    @endif

    @if(Auth::id()!=$message->user->id)
    <a class="pull-left" href="{{route('profile',['slug'=>$message->user->slug])}}">
        <img src="{{$message->user->avatar}}"
        alt="{{ $message->user->name }}" class="img-circle" height="30px" width="30px">
        {{--<img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"--}}
             {{--alt="{{ $message->user->name }}" class="img-circle">--}}
    </a>
    <div class="media-body">
        <a href="{{route('profile',['slug'=>$message->user->slug])}}"><h5 class="media-heading" style="font-weight: bold">{{ $message->user->name }}</h5></a>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small class="" style="font-size: x-small">{{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>

      @endif
</div>
