<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
	public function index(){
		$reports = Report::with('user_name')->get()->toArray();
	    return view('Admin.Report.index',compact('reports'));
	}

}
