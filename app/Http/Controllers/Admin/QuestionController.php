<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question, App\Chapter;
class QuestionController extends Controller
{
    public function question_list(Request $request, $chapter_id){
    	$question_list = Chapter::with('questions_list')->where('id',$chapter_id)->first();
    	// dd($question_list);
    	return view('Admin.Chapter.question.index',compact('question_list','chapter_id'));
    }

    public function add_question(Request $request, $chapter_id){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$add_question = Question::Create([
    										'question'		=>$data['question'],
									        'option_1'		=>$data['option_1'],
									        'option_2'		=>$data['option_2'],
									        'option_3'		=>$data['option_3'],
									        'option_4'		=>$data['option_4'],
									        'correct_option'=>$data['correct_option'],
									        'chapter_id'	=>$data['chapter_id']
    										]);
    		if($add_question){
    			return redirect('admin/chapter/question/'.$chapter_id)->with('success','Question added successfully');
    		}else{
    			return redirect('admin/chapter/question/'.$chapter_id)->with('error','Common_Error');
    		}
    	}
    	return view('Admin.Chapter.question.form',compact('chapter_id'));	
    }

    public function edit_question(Request $request, $question_id){
        $chapter_id = $_GET['chapter_id'];
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $edit_question = Question::where('id',$question_id)->Update([
                                            'question'      =>$data['question'],
                                            'option_1'      =>$data['option_1'],
                                            'option_2'      =>$data['option_2'],
                                            'option_3'      =>$data['option_3'],
                                            'option_4'      =>$data['option_4'],
                                            'correct_option'=>$data['correct_option'],
                                            'chapter_id'    =>$data['chapter_id']
                                            ]);
            if($edit_question){
                return redirect()->back()->with('success','Question edited successfully');
            }else{
                return redirect('admin/chapter/question/'.$chapter_id)->with('error','Common_Error');
            }
        }
        $question_details = Question::where('id',$question_id)->first();
        
        return view('Admin.Chapter.question.form',compact('chapter_id','question_details','question_id'));   
    }

    public function delete(Request $request, $question_id){
        $delete_question = Question::where('id',$question_id)->delete();
        if($delete_question){
            return redirect()->back()->with('success','Question Deleted successfully');
        }else{
            return redirect()->back()->with('error','Common_Error');
        }
    }
}
