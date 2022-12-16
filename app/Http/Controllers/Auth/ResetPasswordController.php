<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    public function getResetPassword()
    {
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        return view('auth.reset',['categories'=>$categories]);
    }
    public function resetPassword(Request $request)
    {

        $email = $request->input('email');
        $code = $request->input('code');
        $time_code = $request->input('time_code');
        $password = $request->input('newpassword2');

        $checkUser = \App\Models\User::where('email',$email)->first();

        if(!$checkUser)
        {
            return response()->json([
                'result' => 'fail',
                'message' => "The email you entered does not exist in the system !"
            ], 200);
        }
        else
        {
            if($checkUser->code != $code)
            {
                return response()->json([
                    'result' => 'fail',
                    'message' => "This code is no longer available , Please request again !"
                ], 200);
            }else
            // if($checkUser->time_code < now()->subHours(24))
            // {
            //     return response()->json([
            //         'result' => 'fail',
            //         'message' => "Time has passed 24 hours, Please request again !"
            //     ], 200);
            // }
            // else
            {
                $checkUser->code = NULL;
                $checkUser->isRequiredChangePassword = 0;
                $checkUser->time_code = NULL;
                $checkUser->password = bcrypt($password);
                $checkUser->save();
                return response()->json([
                    'result' => 'ok',
                    'message' => "Reset password success !"
                ], 200);
            }
        }
    }
}
