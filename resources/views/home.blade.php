@extends('layouts.app')

@section('content')
<search></search>
    <div class="container">
        <div class="row">

	        <div class="col-sm-2">
	          <ul id="sidebar" class="nav nav-pills nav-stacked affix">
	            <li class="active"><a href="{{route('photos')}}">Discover Arts</a></li>
	            <li class=""><a href="/messages">Send Messages</a></li>
	            <li class=""><a href="/pending_requests">See Pending Requests</a></li>
	            <li class=""><a href="/friends">See Your Friends</a></li>
	            <li class=""><a href="#">In1</a></li>
	            <li class=""><a href="#">TechMeMe</a></li>
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
                            <div class="form-group pull-right" style="margin-right:30px">
                                <p class="text-center">
                                    <button class="btn btn-success" type="submit">Share With People</button>
                                </p>
                                
                            </div>
                            </div>


                            <!--creating moadal-->
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                  more details
                            </button>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add more content to your post</h4>
                                        </div>
                                        <div class="modal-body">
                                             <!--<input type="text" class="input form-control" placeholder="type some keywords about this post" name="meta_keywords">-->
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                            <!--end modal-->



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <feed></feed>
@endsection
