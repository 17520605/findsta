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
        return view('auth.passwords.email');
    }
    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;

        $checkUser = User::where('email',$email)->first();

        if(!$checkUser)
        {
            return redirect()->back()->with('danger','Email bạn nhập khôn tồn tại !');
        }

        $code=bcrypt(md5(time().$email));

        $checkUser->code = $code;

        $checkUser->time_code = Carbon::now();

        $checkUser->save();

        $url = route('get.send.reset.password',['code'=>$checkUser->code , 'email'=>$email]);
        $data = [
            'route' => $url
        ];
        //Tiến hành gửi mail
        Mail::send('email.resset_password', $data , function($message) use ($email){
	        $message->to($email, 'Resset Password')->subject('Lấy lại mật khẩu !');
        });
        
        return redirect()->back()->with('success','Mã code đã được gửi đến Email của bạn !');

    }
    public function getresetPassword()
    {
        return view('auth.passwords.reset');
    }
}
