<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Category, App\Question;

class CategoryController extends Controller
{
    public function category_list(Request $request){

        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'parent_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }
        try{
            $category_list = Category::with('childs')->where('parent_id',$data['parent_id'])->get()->toArray();
            $response['code']       = 200;
            $response['status']     = 'success';
            $response['data']    = $category_list;
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }

    public function question_list(Request $request){
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'chapter_id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }
        try{
            $paginate = env('Paginate');
            $question_list = Question::where('chapter_id',$data['chapter_id'])->paginate((int) $paginate);
            $response['code']       = 200;
            $response['status']     = 'success';
            $response['data']       = $question_list;
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }   
    }
}
