<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('profiles.profile')->with('user',$user);
    }

    public function index1($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('profiles.profile1')->with('user',$user);
    }

    public function edit()
    {
        return view('profiles.edit')->with('userProfile', Auth::user()->profile);
    }

    public function update(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'location' => 'required',
            'about' => 'required|max:255',
            'dob' => 'required'
        ]);

        Auth::user()->profile()->update([
            'location' => $request->location,
            'dob' => $request->dob,
            'about' => $request->about
        ]);

       // dd(Auth::user()->profile);

        if($request->hasFile('avatar'))
        {
            Auth::user()->update([
                'avatar' => $request->avatar->store('public/avatars')
            ]);
        }

        Session::flash('success', 'Profile Updated Successfully!');
        return redirect()->back();
    }
}
