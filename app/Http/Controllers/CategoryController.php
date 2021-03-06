<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function add_category(Request $request){
		
       // return $request->all();
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
      
       $category = New Category();
       $category->cat_name = $request->cat_name;

       $category->save();
       return ['message'=>'OK'];
    }

    public function all_category(){
    	$categories = Category::all();
         return response()->json([
            'categories'=>$categories
         ],200);
    }

    public function del_category($id){
    	 // return $id;
         $category = Category::find($id);
         $category->delete();
         
    }

    public function edit_category($id){
    	// return $id;
    	$category = Category::find($id);
    	return response()->json([
          'category'=> $category
    	],200);

    }

    public function update_category(Request $request, $id){
        // return $id;
         $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
       $category = Category::find($id);
       $category->cat_name = $request->cat_name;
       $category->save();
    }
}
