<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function mySeting()
    {
        $userId = get_data_user('web');
        if($userId){
            $user = \App\Models\User::where([
                ['id', $userId]
            ])->first();
            $profile = \App\Models\Profile::where('userId',  $userId)->first();
            $avatarId = $profile->avatarId;
            if($avatarId != null || $avatarId != '')
            {
                $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                $profile->avatar = $avatar->miniUrl();
                
            }else
            {
                $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
            }
            $profile->social = json_decode($profile->social);
            $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
            $userId = get_data_user('web');
            if($userId){
                $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.setting',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
       
    }

    public function saveMySeting($id, Request $request)
    {
        $userId = $id;
        $email = $request->input('email');
        $password = $request->input('password');
        $google = $request->input('google');
        $facebook = $request->input('facebook');
        $skype = $request->input('skype');
        $youtube = $request->input('youtube');
        $twitter = $request->input('twitter');
        $pinterest = $request->input('pinterest');
        $linkedIn = $request->input('linkedIn');
        $contact = $request->input('contact');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $website = $request->input('website');
        $resume = $request->input('resume');
        $career = $request->input('career');
        $address = $request->input('address');
    
        $bio = $request->input('bio');
        $fileChange = $request->input('fileChange');
        //{"google":"","facebook":"","skype":"","youtube":"","linkedIn":"","pinterest":"","twitter":""}	
        $social = array('google' => $google, 'facebook' => $facebook, 'skype' => $skype, 'youtube' => $youtube , 'linkedIn'=>$linkedIn ,'pinterest'=>$pinterest,'twitter'=>$twitter );

        $user = \App\Models\User::where('id', $userId)->first();
        $user->email = $email;
        $user->save();

        $profile = \App\Models\Profile::where('userId', $id)->first();
        if($fileChange === '1')
        {    
            $file = $request->file('avatar');
            if(isset($file))
            {
                $res = $this->uploadFile($file,true,'avatar','image');
                $avatarId = $res->filesId;
            }
            else{
                $avatarId = NULL;
            }

        }
        else
        {
            $avatarId =  $profile->avatarId;
        }
        $profile->avatarId = $avatarId;
        $profile->fname = $fname;
        $profile->lname = $lname;
        $profile->email = $email;
        $profile->contact = $contact;
        $profile->website = $website;
        $profile->career = $career;
        $profile->resume = $resume;
        $profile->address = $address;
        $profile->bio = $bio;
        $profile->social = json_encode($social);
        $profile->save();
        return redirect()->back();

    }

    public function myFavorite()
    {
        $userId = get_data_user('web');
        if($userId){
            $user = \App\Models\User::where([
                ['id', $userId]
            ])->first();
            $profile = \App\Models\Profile::where('userId',  $userId)->first();
            $avatarId = $profile->avatarId;
            if($avatarId != null || $avatarId != '')
            {
                $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                $profile->avatar = $avatar->miniUrl();
                
            }else
            {
                $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
            }
            $profile->social = json_decode($profile->social);
            $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
            $userId = get_data_user('web');
            if($userId){
                $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.favorites',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
    }
    public function myProfile()
    {
        $userId = get_data_user('web');
        if($userId){
            $user = \App\Models\User::where([
                ['id', $userId]
            ])->first();
            $profile = \App\Models\Profile::where('userId',  $userId)->first();
            $avatarId = $profile->avatarId;
            if($avatarId != null || $avatarId != '')
            {
                $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                $profile->avatar = $avatar->miniUrl();
                
            }else
            {
                $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
            }
            $profile->social = json_decode($profile->social);
            $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
            $userId = get_data_user('web');
            if($userId){
                $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.profile',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
    }
    public function message()
    {
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        $userId = get_data_user('web');
        if($userId){
            $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('user.messages',['categories'=>$categories]);
    }
    public function follower()
    {
        $userId = get_data_user('web');
        if($userId){
            $user = \App\Models\User::where([
                ['id', $userId]
            ])->first();
            $profile = \App\Models\Profile::where('userId',  $userId)->first();
            $avatarId = $profile->avatarId;
            if($avatarId != null || $avatarId != '')
            {
                $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                $profile->avatar = $avatar->miniUrl();
                
            }else
            {
                $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
            }
            $profile->social = json_decode($profile->social);
            $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
            $userId = get_data_user('web');
            if($userId){
                $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.follower',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
    }
    public function following()
    {
        $userId = get_data_user('web');
        if($userId){
            $user = \App\Models\User::where([
                ['id', $userId]
            ])->first();
            $profile = \App\Models\Profile::where('userId',  $userId)->first();
            $avatarId = $profile->avatarId;
            if($avatarId != null || $avatarId != '')
            {
                $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                $profile->avatar = $avatar->miniUrl();
                
            }else
            {
                $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
            }
            $profile->social = json_decode($profile->social);
            $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
            if($userId){
                $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.following',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
    }
}





