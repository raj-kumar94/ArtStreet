@extends('layouts.app')
<br><br><br><br>
<div class="container">

    @foreach($photos->chunk(3) as $items)
        <div class="row">

            @foreach($items as $item)
                <div class="col-md-4">
                    <img src="{{$item->image}}" alt="Delete me" height="350px" width="350px">
                </div>
            @endforeach
            
        </div><br><br>
    @endforeach

    
    </div>
</div>
