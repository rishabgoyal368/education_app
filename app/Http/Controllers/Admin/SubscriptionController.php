<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
   
    public function index()
    {
        $subscription_list = Subscription::get()->toArray();
        $label = 'Subscription';
        return view('Admin.subscription.index', compact('label', 'subscription_list'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data                       = $request->all();
            $add_subscription           = new Subscription;
            $add_subscription->title    = $data['title'];
            $add_subscription->description    = $data['description'];
            $add_subscription->price    = $data['price'];
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $add_subscription->image  =    $fileName;
            }
            if ($add_subscription->save()) {
                return redirect('admin/subscription-list')->with('success', 'Subscription added successfully');
            } else {
                return redirect('admin/subscription-list')->with('error', 'Something went wrong, Please try again later.');
            }
        }
        $label = 'Subscription';
        return view('Admin.subscription.form', compact('label'));
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data                           = $request->all();
            $edit_subscription              = Subscription::find($id);
            $edit_subscription->title       = $data['title'];
            $edit_subscription->description = $data['description'];
            $edit_subscription->price       = $data['price'];
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/subscription'), $fileName);
                $edit_subscription->image  =    $fileName;
            }
            if ($edit_subscription->save()) {
                return redirect()->back()->with('success', 'Subscription edited successfully');
            } else {
                return redirect('admin/subscription-list')->with('error', 'Something went wrong, Please try again later.');
            }
        }
        $subscription_details = Subscription::where('id', $id)->first();
        $label ='Subscription';
        return view('Admin.subscription.form', compact('label', 'subscription_details'));
    }

    public function delete(Request $request, $id)
    {
        $delete = Subscription::where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Subscription deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, Please try again later.');
        }
    }

    public function validate_name(Request $request){
        
        $data = $request->all();
        $title = @$data['title'];
        
        
        if ($data['subscription_id'] == null) {
        // echo '<pre>'; print_r($data['teacher_id'] );die;
            
            $count = Subscription::where('title',$title)->count();;
             
            if ($count > 0) {
                return 'false';
            } else {
                return 'true';
            }
        } else{

            $id    = $data['subscription_id'];
            $count = Subscription::where('title',$title)->where('id','!=',$id)->count();;  
            if ($count > 0) {
                return 'false';
            } else {
                return 'true';
            }
        }
    
    }


}
