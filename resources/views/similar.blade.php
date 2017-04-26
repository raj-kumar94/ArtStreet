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



    @foreach($photos as $items)
        <div class="col-md-4">
            <img src="{{$items->image}}" alt="" height="300px" width="300px">
     
                <a href="{{route('similar', ['slug'=>$items->id])}}" class="btn btn-primary btn-xs">Similar Photos</a>
     
        </div>
    @endforeach
    </div>

</div>
 