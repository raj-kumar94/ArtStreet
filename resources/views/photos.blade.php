@extends('layouts.app')
<br><br><br><br>
<div class="container">
<input type="text" class="input form-control" placeholder="search photos"><br><br>




    @foreach($photos->chunk(3) as $items)
        <div class="row">

            @foreach($items as $item)
                <div class="col-md-4">
                    @if(isset($item->user->slug))
                        <a href="{{route('profile', ['slug'=>$item->user->slug])}}"><img src="{{$item->image}}" alt="Delete me" height="350px" width="350px"></a>
                    
                    <div class="text-center">
                        <a href="{{route('similar', ['slug'=>'item1 item2'])}}" class="btn btn-primary btn-xs">Similar Photos</a>
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