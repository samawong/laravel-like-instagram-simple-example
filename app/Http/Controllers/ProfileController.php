<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    
    public function index(User $user)
    {   
        $follows = Auth::user()?Auth::user()->following->contains($user->id): false ;

        $postCount = Cache::remember(
            'count.post.'.$user->id,
            now()->addSeconds(30),
            function() use ($user){
                return $user->post->count();
            }
        );

        $followerCount = Cache::remember(
            'count.follower.'.$user->id,
            now()->addSeconds(30),
            function() use ($user){
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.'.$user->id,
            now()->addSeconds(30),
            function() use ($user){
                return $user->following->count();
            }
        );

        return view('profile.index',[
            'user' => $user,
            'follows' => $follows,
            'postCount'=>$postCount,
            'followerCount'=>$followerCount,
            'followingCount'=>$followingCount,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profile.edit',[ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->authorize('update',$user->profile);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();
        if ($image = $request->file('image')){
            $imagePath =$request->file('image')->store('profile','public');
           $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000,1000);
           $image->save();
        } else {
            unset($input['image']);
        }

        Auth::user()->profile->Update($input);
        return redirect()->route('profile.index',$user->id)->with('success','the profile of user has mododifed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
