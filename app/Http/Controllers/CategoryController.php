<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $parentCategories = Category::orderby('id','asc')->get();
        // dd($parentCategories);
        return view('Admin.category.index',compact('parentCategories'));
    }

    public function add(Request $request){
    	if($request->isMethod('post')){
    		$data =$request->all();
    		// dd($data);
            $add = new Category;
            $add->title = $data['title'];
            if(empty($data['category'])){
                $add->parent_id = 0;
            }else{
                $add->parent_id = $data['category'];
            }
            if($add->save()){
                return redirect('admin/category')->with('success','Category added Successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong, Please try again later.');
            }
    	}
        $parentCategories = Category::where('parent_id', '=', 0)->with('childs')->get(); 
       	// dd($parentCategories);
        return view('Admin.category.form',compact('parentCategories'));
    } 

    public function delete(Request $request, $id){
        // dd($id);
        // $delete = Category::where('id',$id)->delete();
     
    }
}
