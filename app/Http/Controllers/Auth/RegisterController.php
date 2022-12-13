<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user =new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if($user->id)
        {
            return redirect()->route('get.login');
        }
        else
        return redirect()->back;
    }
}
