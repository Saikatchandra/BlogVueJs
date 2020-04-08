<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Post extends Model
{
    public function category(){ 
    	        // this 'cat_id' for foreign key in Post table
    	// return $this->belongsTo(Category::class,'cat_id'); 
    	return $this->belongsTo('App\Category','cat_id');
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
