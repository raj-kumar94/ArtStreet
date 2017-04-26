@extends('layouts.app')
<br><br><br><br>
<div class="container">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
        @foreach($categ as $c)
            <li><a href="{{route('categories', ['slug' => $c->slug])}}">{{$c->name}}</a></li>
        @endforeach
    </ul>
  </div>
</nav>

<form action="/photos" method="get">
    <!--{{csrf_field()}}-->
    <div class="row">
        <div class="col-md-10">
            <input type="text" class="input form-control" placeholder="search photos" name="query"><br><br>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary xs" type="submit">Search</button>
        </div>
    </div>
</form>



    @foreach($photos->chunk(3) as $items)
        <div class="row">

            @foreach($items as $item)
                <div class="col-md-4">
                    @if(isset($item->user->slug))
                        <a href="{{route('profile', ['slug'=>$item->user->slug])}}"><img src="{{$item->image}}" alt="Delete me" height="350px" width="350px"></a>
                    
                    <div class="text-center">
                        <a href="{{route('similar', ['slug'=>$item->id])}}" class="btn btn-primary btn-xs">Similar Photos</a>
                        <a href="{{route('profile', ['slug'=>$item->user->slug])}}" class="btn btn-success btn-xs">Visit User</a>
                    </div>
                    @else   
                    <a href="#"><img src="{{$item->image}}" alt="Delete me" height="350px" width="350px"></a>
                    @endif

                </div>
            @endforeach
            
        </div><br><br>
    @endforeach
    </div>

</div>

<div class="text-center">
    {{ $photos->links() }}
</div>  