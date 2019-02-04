<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Profile;
use App\User;
use Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function index(Profile $profile)
    {
        $id = Auth::id();
        $profile = $profile::first()->where('user_id', $id)->get();
        //return $profile;
        if (count($profile) > 0) {
            return redirect('dashboard')->with('response', 'this is your dashboard');
        } else {

       // return $user;
            return view('profile.profile');
        }
    }

    public function show(User $user)
    {
        return $user;
    }
    /**
     * This function is now documwnted
     *
     * @param Request $request
     * @return void bind
     */
    public function add(Request $request)
    {

        $this->validate(
            $request,
            [
                'username' => 'required',
                'telephone' => 'required',
                'gender' => 'required',
                'bio' => 'required',
                'image' => 'required',
                'profession' => 'required'

            ]
        );
       // return $request->all();

        $profile = new Profile;

        $profile->user_id = Auth::id();
        $profile->username = $request->input('username', 'Please update your Username');
        $profile->telephone = $request->input('telephone', 'Please update your phone number');
        $profile->gender = $request->input('gender', 'Please update your gender');
        $profile->bio = $request->input('bio', 'This is my default bio');
        $profile->profession = $request->input('profession', 'This is my default profession');
        /**
         * Adding the image upload file
         */

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path() . '/profile/', date('d-m-y') . $file->getClientOriginalName());
            $url = URL('/profile/' . date('d-m-y') . $file->getClientOriginalName());


        }
        $profile->image = $url;

        $profile->save();

        return redirect('pro')->with('response', 'profile added successfully');
    }

    public function dashboard()
    {
        $id = Auth::id();
        $profile = new Profile;

        $prof = $profile->where('user_id', $id)->first();


        return view('profile.dashboard', compact('prof'));
    }
}
