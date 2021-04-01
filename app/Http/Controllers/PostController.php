<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Sheba\Annotation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ReflectionClass;

class PostController extends Controller
{
    public function index(Request $request)
    {
        #$posts = Post::all(['id', 'name']);
        $posts = Post::with('comments')->get();
        dd($posts->first()->comments);
        $users  = User::all();
        $posts = $users->first()->posts;
        dd($posts);
        return response()->json(['posts'=>$posts]);
    }
    public function store()
    {
        Post::Create([
            'name' => 'Flight 10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return "Done";
    }
}
