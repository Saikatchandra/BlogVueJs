<?php

namespace App\Http\Controllers;

use App\Post;
// use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post(){
    	$posts = Post::with('category','user')->get();
         return response()->json([
            'posts'=>$posts
         ],200);
    }

}
