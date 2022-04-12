<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->paginate(5);
        return view('post.index',['posts'=>$posts]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'caption'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $postImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";

            $imageresize = Image::make("images/{$postImage}")->fit(1200,1200);
            $imageresize->save();
        } else {
            unset($input['image']);
        }
        
        Auth::user()->post()->create($input);
        return redirect()->route('dashboard');

    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
