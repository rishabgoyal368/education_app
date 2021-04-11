<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', 'ApiController@user_registration');
Route::post('/login', 'ApiController@user_login');
Route::get('/logout','ApiController@logout'); 
Route::post('/forgot-password','ApiController@forgot_password');
Route::post('/reset-password','ApiController@reset_password');
Route::get('/get-profile','ApiController@profile'); 
Route::post('/update-profile','ApiController@updateProfile'); 

//===================Catgory==========================
Route::post('/category','Api\CategoryController@category_list');
//===================Catgory==========================


//===================chapter==========================
Route::post('/question-list','Api\CategoryController@question_list');
//===================chapter==========================

//=================== Report ====================
Route::post('/report','Api\CategoryController@submit_result');
//=================== Report ====================

//=================== view result ====================
Route::get('/view-result','Api\CategoryController@view_result');
//=================== view result ====================