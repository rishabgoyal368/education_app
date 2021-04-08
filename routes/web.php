<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get','post'],'/','AuthController@login');
Route::match(['get','post'],'/admin/login','AuthController@login');
Route::match(['get','post'],'/forgot-password','AuthController@forgot_password');
Route::match(['get','post'],'/set-password/{security_code}/{user_id}','AuthController@set_password');
Route::match(['get','post'],'/logout','AuthController@logout');

Route::group(['prefix'=>'admin','middleware'=>'CheckAdminAuth'],function()
{
	//------Dahboard---------------------------------------------------------------------------
	Route::get('/home','Admin\AdminController@index');

	//------Dahboard---------------------------------------------------------------------------


	//------Manage User ---------------------------------------------------------------------------
	Route::get('/manage-users','Admin\UsersController@index');
	Route::any('/add-user','Admin\UsersController@add');
	Route::any('edit-user/{id}','Admin\UsersController@add');
	Route::any('delete-user/{id}','Admin\UsersController@delete');

	//------Manage User ---------------------------------------------------------------------------

	// //------Category Management  ---------------------------------------------------------------------------
	// Route::get('/category','Admin\CategoryManagement@index');
	// Route::match(['get','post'],'/category/add','Admin\CategoryManagement@add');
	// Route::match(['get','post'],'/category/edit/{id}','Admin\CategoryManagement@edit');
	// Route::match(['get','post'],'/category/delete/{id}','Admin\CategoryManagement@delete');
	// //------Category Management  ---------------------------------------------------------------------------
	
    Route::match(['get','post'],'/reset-password','AuthController@reset_password');
    Route::match(['get','post'],'/my-profile','AuthController@my_profile');

    //===================category management=========================
    Route::match(['get','post'],'/category','Admin\CategoryController@index');
    Route::match(['get','post'],'/category/add','Admin\CategoryController@add');
    Route::match(['get','post'],'/category/edit/{id}','Admin\CategoryController@edit');
    Route::match(['get','post'],'/category/delete/{id}','Admin\CategoryController@delete');
    //===================category management=========================


    //===================Chapter management=========================
    Route::match(['get','post'],'/chapter','Admin\ChapterController@index');
    Route::match(['get','post'],'/chapter/add','Admin\ChapterController@add');
    Route::match(['get','post'],'/chapter/edit/{id}','Admin\ChapterController@edit');
    Route::match(['get','post'],'/chapter/delete/{id}','Admin\ChapterController@delete');
    Route::post('/paper-change','Admin\ChapterController@change_paper');
    Route::post('/class-change','Admin\ChapterController@change_class');
    //===================Chapter management=========================

    //=================Question managaement=========================
    Route::match(['get','post'],'/chapter/question/{chapter_id}','Admin\QuestionController@question_list');
    Route::match(['get','post'],'/chapter/question/add/{chapter_id}','Admin\QuestionController@add_question');
    Route::match(['get','post'],'/chapter/question/edit/{question_id}','Admin\QuestionController@edit_question');
    Route::match(['get','post'],'/chapter/question/delete/{question_id}','Admin\QuestionController@delete');
    //=================Question managaement=========================

    define('Common_Error','Something went wrong, Please try again later.');
    
});
