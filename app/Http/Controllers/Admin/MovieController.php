<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
    	$label = 'Movies';
    	return view('Admin.Movies.index',compact('label'));
    } 
}
