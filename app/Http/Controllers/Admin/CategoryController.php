<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $parentCategories = Category::with('parent')->orderby('id','asc')->get()->toArray();
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
    
        return view('Admin.category.form',compact('parentCategories'));
    } 

    public function edit(Request $request, $id){
        if($request->isMethod('post')){
            $data =$request->all();
            $update = Category::where('id',$id)->Update([
                                                    'title'=>$data['title']
                                                        ]);
            if($update){
                return redirect()->back()->with('success','Category Updated Successfully');
            }else{
                return redirect('admin/category')->with('error','Something went wrong, Please try again later.');
            }
        }
        $category = Category::with('parent')->where('id',$id)->first();
        return view('Admin.category.form',compact('category'));
    }

    public function delete(Request $request, $id){
        $delete = Category::with('childs')->where('id',$id)->first();
        if(count($delete['childs'])<=0){
            $delete->delete();
            return redirect()->back()->with('success','Category Deleted Successfully');
        }else{
            return redirect()->back()->with('error','To delete category first delete their child first.');
        }
     
    }
}
