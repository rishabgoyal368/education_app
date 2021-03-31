<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $parentCategories = Category::where('parent_id','Null')->get();
        // dd($parentCategories);
        return view('Admin.category.index',compact('parentCategories'));
    }

    public function add(Request $request){
    	if($request->isMethod('post')){
    		$data =$request->all();
    		dd($data);
    	}
    	 $parentCategories = Category::where('parent_id','Null')->get();
    	return view('Admin.category.form',compact('parentCategories'));
    } 
}
