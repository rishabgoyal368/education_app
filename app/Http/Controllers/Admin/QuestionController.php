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
    		$data                         = $request->all();
    		$add_question                 = new Question;
			$add_question->question		  = $data['question'];
	        $add_question->option_1		  = $data['option_1'];
	        $add_question->option_2		  = $data['option_2'];
	        $add_question->option_3		  = $data['option_3'];
	        $add_question->option_4		  = $data['option_4'];
            $add_question->correct_option = $data['correct_option'];
            if($data['correct_option'] == 'option_1'){
                $correct_answer = $data['option_1'];
            }elseif($data['correct_option'] == 'option_2'){
                $correct_answer = $data['option_2'];
            }elseif($data['correct_option'] == 'option_3'){
                $correct_answer = $data['option_3'];
            }elseif($data['correct_option'] == 'option_4'){
                $correct_answer = $data['option_4'];
            }
	        $add_question->correct_answer = $correct_answer;
	        $add_question->chapter_id	  = $data['chapter_id'];
    		if($add_question->save()){
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
            $data                          = $request->all();
            $edit_question                 = Question::find($question_id);
            $edit_question->question       = $data['question'];
            $edit_question->option_1       = $data['option_1'];
            $edit_question->option_2       = $data['option_2'];
            $edit_question->option_3       = $data['option_3'];
            $edit_question->option_4       = $data['option_4'];
            $edit_question->correct_option = $data['correct_option'];
            if($data['correct_option'] == 'option_1'){
                $correct_answer = $data['option_1'];
            }elseif($data['correct_option'] == 'option_2'){
                $correct_answer = $data['option_2'];
            }elseif($data['correct_option'] == 'option_3'){
                $correct_answer = $data['option_3'];
            }elseif($data['correct_option'] == 'option_4'){
                $correct_answer = $data['option_4'];
            }
            $edit_question->correct_answer = $correct_answer;
            $edit_question->chapter_id     = $data['chapter_id'];
            if($edit_question->save()){
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
