<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
    	$label = 'Subscription';
    	return view('Admin.Subscription.list',compact('label'));
    } 
}
