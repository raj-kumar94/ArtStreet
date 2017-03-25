@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit your profile.</div>

                    <div class="panel-body">
                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="avatar">Upload Profile Photo</label>
                                <input type="file" name="avatar" class="form-control" accept="image/*" value="{{$userProfile->avatar}}">
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" value="{{$userProfile->location}}" required>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of birth</label>
                                <input type="date" class="form-control" name="dob" value="{{$userProfile->DOB}}">
                            </div>

                            <div class="form-group">
                                <label for="about">About me</label>
                                <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>{{$userProfile->about}}</textarea>
                            </div>

                            <div class="form-group">
                                <p class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit">Save</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection