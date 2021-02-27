<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryManagement extends Controller
{
    protected $label;
    public function __construct()
    {
        $this->label = 'Category';
    }
    public function index(){
        $category_list = Category::get()->toArray();
    	$label = $this->label;
    	return view('Admin.categoryManagement.list',compact('label','category_list'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $data                   = $request->all();
            $add_category           = new Category;
            $add_category->title    = $data['title'];
            $add_category->type     = $data['type'];
            if($add_category->save()){
                return redirect('/category')->with('success','Category added successfully');
            }else{
                return redirect('/category')->with('error','Something went wrong, Please try again later.');
            }
        }
    	$label = $this->label;
    	return view('Admin.categoryManagement.form',compact('label'));
    }

    public function edit(Request $request, $id){
        if($request->isMethod('post')){
            $data                   = $request->all();
            $edit_category           = Category::find($id);
            $edit_category->title    = $data['title'];
            $edit_category->type     = $data['type'];
            if($edit_category->save()){
                return redirect('/category')->with('success','Category edited successfully');
            }else{
                return redirect('/category')->with('error','Something went wrong, Please try again later.');
            }
        }
        $category_details = Category::where('id',$id)->first();
    	$label = $this->label;
    	return view('Admin.categoryManagement.form',compact('label','category_details'));
    }

    public function delete(Request $request, $id){
        $delete = Category::where('id',$id)->delete();
        if($delete){
            return redirect()->back()->with('success','Category deleted successfully');
        }else{
            return redirect('/category')->with('error','Something went wrong, Please try again later.');
        }
    }


}
