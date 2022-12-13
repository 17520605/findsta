<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\MailService;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Session;
class RegisterController extends Controller
{
    
    public function getRegister()
    {
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        return view('auth.register',['categories'=>$categories]);
    }

    public function postRegister(Request $request)
    {
        $user =new User();
        $email = $request->input('email');
        $password = $request->input('password');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $user = User::where('email', $email)->first();
        if($user != null){
            return response()->json([
                'result' => 'fail',
                'message' => "This email already exists in the system"
            ], 200);
        }
        else
        {
            $user = new User;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->level = 0;
            $user->email_verified_at = Carbon::now();
            $user->type = 'website';
            $user->slug = Str::random(5);
            $user->remember_token = Str::random(45);
            $saved = $user->save();
            if($saved){
                $profile = new Profile;
                $profile->userId = $user->id;
                $profile->fname = $fname;
                $profile->lname = $lname;
                $profile->email = $email;
                $lang = Session::get('language'); 
                if($lang)
                {
                    $profile->lang = $lang;
                }
                else
                {
                    $profile->lang = 'en';
                }
                $saved_profile = $profile->save();
                if($saved_profile){
                    $mail = new MailService(
                        [$email],
                        'Notice of successful account creation',
                        'mail.newAccount',
                        $profile
                    );
                    $mail->sendMail();
                    return response()->json([
                        'result' => 'ok',
                        'message' => "Register success !"
                    ], 200);
                }
                else{
                    return response()->json([
                        'result' => 'fail',
                        'message' => "Register Fail!"
                    ], 200);
                }
            }
        }
    }
}
