<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function get_all_post(){
    	$posts = Post::with('user','category')->orderBy('id','desc')->get();
    	return response()->json([
            'blogpost'=> $posts
    	],200); 
    }
}
