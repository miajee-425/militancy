<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all(['id', 'name']);
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
