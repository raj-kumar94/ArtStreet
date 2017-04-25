@extends('layouts.app')
<br><br><br><br>
<div class="container">

    @foreach($photos->chunk(3) as $items)
        <div class="row">

            @foreach($items as $item)
                <div class="col-md-4">
                    @if(isset($item->user->slug))
                        <a href="{{route('profile', ['slug'=>$item->user->slug])}}"><img src="{{$item->image}}" alt="Delete me" height="350px" width="350px"></a>
                    @else   
                    <a href="#"><img src="{{$item->image}}" alt="Deleted" height="350px" width="350px"></a>
                    @endif
                </div>
            @endforeach
            
        </div><br><br>
    @endforeach
    </div>

    <span id="abcd"></span>
    <script>        
        document.getElementById("abcd").innerHTML = "Come back later to see more photos!";
    </script>

</div>
<div class="text-center">
    {{ $photos->links() }}
</div>  