<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $credentials =$request->only('email','password');

        if(\Auth::attempt($credentials))
        {
            return response()->json([
                'result' => 'ok',
                'message' => "Login success"
            ], 200);
        }
        else{
            return response()->json([
                'result' => 'fail',
                'message' => "Failed action please try again !"
            ], 200);
        }
    }
    public function getLogout()
    {
        \Auth::logout();
        return redirect()->back();
        
    }

}
