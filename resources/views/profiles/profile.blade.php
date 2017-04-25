@extends('layouts.app')

@section('content')


<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
             <b><h1 class="">{{$user->name}}</h1><b>
         
          @if(Auth::id()!=$user->id)
         
           <friend :profile_user_id="{{ $user->id }}"></friend>
          
          <!-- <button type="button" class="btn btn-success">Book me!</button>  
          <button type="button" class="btn btn-info">Send me a message</button> -->

          @else
          	<a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">Edit Profile</a> 
          @endif
<br>
        </div>
      <div class="col-sm-2"><div class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{$user->avatar}}"></div>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span> {{$user->created_at}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Last seen</strong></span> Yesterday</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span>{{$user->name}}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">Location: </strong></span> {{$user->profile->location}} 
              </li>
            </ul>
           <div class="panel panel-default">
             <div class="panel-heading">How much do you love ArtStreet?

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i> ArtStreet as well as Art is my life.

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://ArtStreet.com" class="">ArtStreet</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">	
                	<i class="glyphicon glyphicon-cloud"></i>  
                	<i class="fa fa-github fa-2x"></i> 
                    <i class="fa fa-twitter fa-2x"></i> 
                    <i class="fa fa-pinterest fa-2x"></i>  
                    <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$user->name}}</h2></div>
                <div class="panel-body"> {{$user->profile->about}}

                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">some user photos</div>
                <div class="panel-body">
                  <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/people">
						<div class="caption">
							<h3>
								Rover
							</h3>
							<p>
								Cocker Spaniel who loves treats.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/city">
						<div class="caption">
							<h3>
								Marmaduke
							</h3>
							<p>
								Is just another friendly dog.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/sports">
						<div class="caption">
							<h3>
								Rocky
							</h3>
							<p>
								Loves catnip and naps. Not fond of children.
							</p>
							<p>
							
							</p>
						</div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
           <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}</div>
                <div class="panel-body"> {{$user->profile->about}}

                </div>
</div></div>


            <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <p> 
                        <a href="http://twitter.com/ArtStreet" rel="nofollow" title="ArtStreet on Twitter" target="ext">Twitter</a><br>
                        <a href="https://plus.google.com/+ArtStreet" rel="publisher">Google+</a><br>
                        <a href="http://facebook.com/ArtStreet" rel="nofollow" title="ArtStreet on Facebook" target="ext">Facebook</a><br>
                        <a href="https://github.com/iatek/ArtStreet" title="ArtStreet on GitHub" target="ext">GitHub</a><br>
                    </p>
                </div>
                
                
                <div class="span3">
                    <span class="pull-right">©Copyright 2017-2018 <a href="/" title="ArtStreet">ArtStreet</a></span>
                </div>
            </div>
        </footer>
        
        

</div>


@stop

<!--i am using this-> http://www.bootply.com/DVDS9uf79e -->