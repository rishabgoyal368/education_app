<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category, App\Chapter;

class ChapterController extends Controller
{
	public function index(){
		$chapter_list = Chapter::with('subject','paper','class')->get()->toArray();
        return view('Admin.Chapter.index',compact('chapter_list'));
	}

	public function add(Request $request){
		if($request->isMethod('post')){
			$data = $request->all();
			$create_chapter = Chapter::Create([
											'chapter_name'	=>	$data['chapter_name'],
											'paper_id'		=>	$data['paper_id'],
											'class_id'		=>	$data['class_id'],
											'subject_id'	=>	$data['subject_id'],
												]);
			if($create_chapter){
				return redirect('/admin/chapter')->with('success','Chapter added successfully');
			}else{
				return redirect('/admin/chapter')->with('error','Something went wrong, Please try again later.');
			}
		}
		$class_list   = "";
		$subject_list = "";
		$paper_list  		= Category::where('parent_id',0)->get()->toArray();
        return view('Admin.Chapter.form',compact('paper_list','class_list','subject_list'));
	}

	public function edit(Request $request, $id){
		if($request->isMethod('post')){
			$data = $request->all();
			$create_chapter = Chapter::where('id',$id)->Update([
											'chapter_name'	=>	$data['chapter_name'],
											'paper_id'		=>	$data['paper_id'],
											'class_id'		=>	$data['class_id'],
											'subject_id'	=>	$data['subject_id'],
												]);
			if($create_chapter){
				return redirect()->back()->with('success','Chapter updated successfully');
			}else{
				return redirect('/admin/chapter')->with('error','Something went wrong, Please try again later.');
			}
		}
		$chapter_details  	= Chapter::with('paper','subject','class')->where('id',$id)->first();
		$class_list  		= Category::where('parent_id',$chapter_details['paper_id'])->get()->toArray();
		$subject_list  		= Category::where('parent_id',$chapter_details['class_id'])->get()->toArray();
		$paper_list  		= Category::where('parent_id',0)->get()->toArray();
        return view('Admin.Chapter.form',compact('paper_list','chapter_details','class_list','subject_list'));
	}


	public function delete(Request $request, $id){
		$delete_chapter = Chapter::where('id',$id)->delete();
		if($delete_chapter){
			return redirect()->back()->with('success','Chapter deleted successfully');
		}else{
			return redirect()->back()->with('success','Something went wrong, Please try again later.');
		}
	}

	public function change_paper(Request $request){
		$data 		=	$request->all();
		$paper_id 	= 	$data['paper_id'];
		if(!empty($paper_id)){
			$class_list = 	Category::where('parent_id',$paper_id)->get()->toArray();
			$resp = [];
			$html 		=	 "";
			$html  		=	'<option disabled selected>Select</option>'; 
			foreach ($class_list as $key => $class) {
				$html .='<option value="'.$class['id'].'">'.$class['title'].'</option>';           
			}
			$resp['status'] 	= 	'true';
			$resp['html'] 		= 	$html;
		}else{
			$resp['status'] 	= 	'false';
			$resp['html'] 		= 	'';
		}
		return $resp;
	}

	public function change_class(Request $request){
		$data 		=	$request->all();
		$class_id 	= 	$data['class_id'];
		if(!empty($class_id)){
			$class_list = 	Category::where('parent_id',$class_id)->get()->toArray();
			$resp = [];
			$html 		=	 "";
			$html  		=	'<option disabled selected>Select</option>'; 
			foreach ($class_list as $key => $class) {
				$html .='<option value="'.$class['id'].'">'.$class['title'].'</option>';           
			}
			$resp['status'] 	= 	'true';
			$resp['html'] 		= 	$html;
		}else{
			$resp['status'] 	= 	'false';
			$resp['html'] 		= 	'';
		}
		return $resp;
	}
}
