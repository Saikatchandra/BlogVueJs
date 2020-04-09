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
    public function get_single_post($id){
        $post = Post::with('user','category')->where('id',$id)->first();
        return response()->json([
             'post'=>$post
        ],200);
    }
}
