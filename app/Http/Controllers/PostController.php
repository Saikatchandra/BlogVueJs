<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_category(){
    	$category = Category::with('posts')->get();
    	return $category;

    	
    }
}
