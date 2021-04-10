<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['title','parent_id'];

 	// public function subcategory(){
  //       return $this->hasMany('App\Category', 'parent_id');
  //   }

     public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent(){
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function chapter_list(){
        return $this->hasMany(Chapter::class, 'subject_id', 'id');
    }
}
