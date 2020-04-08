<?php

namespace App\Http\Controllers;

use App\Post;
// use App\Category;
use Illuminate\Http\Request;
use Auth;
use Image;

class PostController extends Controller
{
    public function all_post(){
    	$posts = Post::with('category','user')->orderBy('id','desc')->get();
         return response()->json([
            'posts'=>$posts
         ],200);
    }

    public function save_post(Request $request){
         $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);
         //Get image extention
          $strpos = strpos($request->photo,';');  //select position till semicolon
          $substr = substr($request->photo,0,$strpos); // select string till before semicolon
          $ex = explode('/', $substr)[1]; // explode is use to convert a string to array
           // return $ex;
          
          $name = time().".".$ex;        //name format  of upload image
          $img = Image::make($request->photo)->resize(200, 200);  // use Image Intervention
          $uploadpath = public_path()."/uploadImage/";
          $img->save($uploadpath.$name);
         
          $post = new Post();
          $post->title =$request->title;
          $post->description =$request->description;
          $post->photo =$request->photo;
          $post->cat_id =$request->cat_id;
          $post->user_id = Auth::user()->id;
          $post->photo = $name;
          $post->save();

    }

    public function del_post($id){
    	$post = Post::find($id);
    	$imgLocation = public_path()."/uploadImage/";
    	$img = $imgLocation.$post->photo;
    	if(file_exists($img)){
    		@unlink($img);
    	}
    	$post->delete();

    }

    public function edit_post($id){
      $post = Post::find($id);
      return response()->json([
           'post' => $post
      ],200);
    }

    public function update_post(Request $request, $id){
          $post =  Post::find($id);

          $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


          if($request->photo!=$post->photo){
              
              //Get image extention
          $strpos = strpos($request->photo,';');  //select position till semicolon
          $substr = substr($request->photo,0,$strpos); // select string till before semicolon
          $ex = explode('/', $substr)[1]; // explode is use to convert a string to array
          $name = time().".".$ex;        //name format  of upload image
          $img = Image::make($request->photo)->resize(200, 200);  // use Image Intervention
          $uploadpath = public_path()."/uploadImage/";
          $image = $uploadpath.$post->photo;
          $img->save($uploadpath.$name);

            if(file_exists($image)){
                @unlink($image);
              }
              
          } else{
              $name = $post->photo;
          }
         
         
          $post->title =$request->title;
          $post->description =$request->description;
          $post->photo =$request->photo;
          $post->cat_id =$request->cat_id;
          $post->user_id = Auth::user()->id;
          $post->photo = $name;
          $post->save();
    }

}
