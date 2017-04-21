@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

	        <div class="col-sm-2">
	          <ul id="sidebar" class="nav nav-stacked affix">
	            <li><a href="{{route('photos')}}">home.blade.php</a></li>
	            <li><a href="#">Link 2</a></li>
	            <li><a href="#">Link 3</a></li>
	            <li><a href="#">Link 4</a></li>
	            <li><a href="#">In1</a></li>
	            <li><a href="#">TechMeMe</a></li>
	       	  </ul>
	     	 </div>

            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center;">Create a new post</div>

                    <div class="panel-body">
                        <form action="{{route('post')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="content">Share Your Thoughts</label>
                                <textarea name="content" id="content" cols="5" rows="3" class="form-control" required></textarea>
                            </div>

                            <div>	
					

                               <test></test>
                            <div class="form-group pull-left" style="margin-left:30px">
                                <p class="text-center">
                                    <button class="btn btn-success" type="submit">Share With People</button>
                                </p>
                                
                            </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <feed></feed>
@endsection
