<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

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

    public function get_all_category(){
    	$categories = Category::all();
         return response()->json([
            'categories' => $categories
         ]);
    }

    public function get_post_by_catId($id){
       $posts = Post::with('user','category')->where('cat_id',$id)->orderBy('id','desc')->get();
       return response()->json([
            'posts'=> $posts
    	],200);
        
    }

    public function search_post(){
        $search = \Request::get('s');
          $posts = Post::with('user','category')
          ->where('title','LIKE',"%$search%")
          ->orWhere('description','LIKE',"%$search%")
          ->get();

          return response()->json([
            'posts'=> $posts
        ],200);

    }

    public function latest_post(){
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'blogpost'=> $posts
        ],200); 
    }
}
