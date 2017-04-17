@extends('layouts.app')
<br><br><br><br>
<div class="container">
    <div class="row">
    @foreach($photos as $photo)
        @if ($loop->index %3!=0)
        <img src="{{$photo->image}}" alt="" class="col-md-4" height="200px" width="200px">

        @else

        @endif
    
    @endforeach
    
    </div>
</div>
