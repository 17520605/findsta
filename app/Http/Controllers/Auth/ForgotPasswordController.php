<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;


class ForgotPasswordController extends Controller
{
    public function getFormResetPassword()
    {
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        return view('auth.forgot',['categories'=>$categories]);
    }
    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->input('email');
        $time_code = Carbon::now();
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
            $profile = \App\Models\Profile::where('email',  $email)->first();

            $code=bcrypt(md5(time().$email));

            $checkUser->code = $code;
            $checkUser->isRequiredChangePassword = 1;
            $checkUser->time_code = $time_code;

            $checkUser->save();

            $url = route('get.reset',['code'=>$checkUser->code , 'email'=>$email, 'time_code'=>$time_code]);
            $data = [
                'route' => $url,
                'name' => $profile->lname .' '.$profile->fname,
            ];
            //Tiến hành gửi mail
            Mail::send('mail.resset_password', $data , function($message) use ($email){
                $message->to($email, 'Resset Password')->subject('Resset Password');
            });
            
            return response()->json([
                'result' => 'ok',
                'message' => "The request for a refund has been sent, please check your email !"
            ], 200);

        }
        
    }
}
