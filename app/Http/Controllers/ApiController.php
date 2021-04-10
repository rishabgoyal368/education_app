<?php

namespace App\Http\Controllers;

use JWTAuth;
use Validator;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
// use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Admin;
use Mail, Hash, Auth;

class ApiController extends Controller
{
    public function user_registration(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users,email,Null,id,deleted_at,NULL',
                'password' => 'required',
                'first_name' => 'required',
                // 'last_name' => 'required',
                // 'mobile_number' => 'required|numeric|unique:users,mobile_number',
            ]
        );

        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }

        $user = new User();
        $user->first_name         = $data['first_name'];
        $user->last_name          = '.';
        $user->email              = $data['email'];
        $user->mobile_number     = '.';
        $hash_password          = Hash::make($data['password']);
        $user->password         = str_replace("$2y$", "$2a$", $hash_password);
        $user->status             = 'Active';
        if ($user->save()) {
            return response()->json(['message' => 'User register Successfuly', 'data' => $user, 'code' => 200]);
        } else {
            return response()->json(['message' => 'Something went wrong', 'code' => 400]);
        }
    }

    public function user_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
                'password'   => 'required'
            ]
        );
        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }
        $token = auth()->attempt($credentials);
        if ($token) {
            $user = auth()->userOrFail();
            return response()->json(['message' => 'User login Successfuly', 'token' => $token, 'data' => $user, 'code' => 200]);
        } else {
            return response()->json(['message' => 'Something went wrong', 'code' => 400]);
        }
    }

    public function profile(Request $request)
    {
        try {
            $user = auth()->userOrFail();
            $user['profile_image'] = @$user->profile_image ? env('APP_URL') . 'uploads/' . $user->profile_image : 'http://www.pngall.com/wp-content/uploads/5/Profile-Male-PNG-180x180.png';
            return response()->json(['message' => 'User Profile', 'data' => $user, 'code' => 200]);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }


    public function forgot_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
            ]
        );

        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }


        $check_email_exists = User::where('email', $request['email'])->first();
        if (empty($check_email_exists)) {
            return response()->json(['error' => 'Email not exists.'], 200);
        }


        $check_email_exists->secret_key           =  rand(1111, 9999);
        if ($check_email_exists->save()) {
            $project_name = env('App_name');
            $email = $request['email'];
            try {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    Mail::send('emails.user_forgot_password_api', ['name' => ucfirst($check_email_exists['first_name']) . ' ' . $check_email_exists['last_name'], 'otp' => $check_email_exists['secret_key']], function ($message) use ($email, $project_name) {
                        $message->to($email, $project_name)->subject('User Forgot Password');
                    });
                }
            } catch (Exception $e) {
            }
            return response()->json(['message' => 'Email sent on registered Email', 'code' => 200]);
        } else {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'secret_key'       =>  'required|numeric',
                'email'      => 'required|email',
                'password'   => 'required',
                'confirm_password' => 'required_with:password|same:password'
            ]
        );
        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }
        $email = $data['email'];
        $check_email = User::where('email', $email)->first();
        if (empty($check_email['secret_key'])) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
        if (empty($check_email)) {
            return response()->json(['message' => 'This Email-id is not exists.', 'code' => 400]);
        } else {
            if ($check_email['secret_key'] == $data['secret_key']) {
                $hash_password                  = Hash::make($data['password']);
                $check_email->password          = str_replace("$2y$", "$2a$", $hash_password);
                $check_email->secret_key               = null;
                if ($check_email->save()) {
                    return response()->json(['message' => 'Password changed successfully', 'code' => 200]);
                } else {
                    return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
                }
            } else {
                return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
            }
        }
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'last_name'     => 'required',
                'profile_pic'     => 'required',
                'mobile_number' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }

        $user =   auth()->userOrFail();
        $user->first_name         = $data['first_name'];
        $user->last_name          = $data['last_name'];
        $user->mobile_number     = $data['mobile_number'];
        if ($data['profile_pic']) {
            $fileName = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads'), $fileName);
            $user->profile_pic     = $fileName;
        }
        $user->save();
        return response()->json(['message' => 'Profile updated successfully', 'code' => 200]);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'logout successfully', 'code' => 200]);
    }
}
