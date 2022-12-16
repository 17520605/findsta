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
                $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
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

    public function changePassword($id, Request $request)
    {
        $userId = $id;
        $password = $request->input('newpassword2');
        $user = \App\Models\User::where('id', $userId)->first();
        if($user)
        {
            $user->password = bcrypt($password);
            $user->save();
            return redirect()->back();
        }
        return false;
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
                $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            $favorites = \App\Models\Favorites::where([['userId',$userId]])->orderby('id', 'DESC')->get();
            foreach ($favorites as $favorite) {
                $list = \App\Models\Blogs::where([['id',$favorite->blogId]])->first();
                $bannerId = $list->bannerId;
                if($userId)
                {
                    $bookmark = \App\Models\Bookmarks::where([['userId',$userId],['blogId',$list->id]])->first();
                    if($bookmark)
                    {
                        $list->bookmark = true;
                    }
                    else
                    {
                        $list->bookmark = false;
                    }
                }
                if($bannerId)
                {
                    $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                    $list->thumbnail = $poster->thumbnail;
                }
                else
                {
                    $fileId = $list->fileId;
                    $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                    $list->thumbnail = $poster->thumbnail;
                }
                $categoryId = $favorite->categoryId;
                if($categoryId)
                {
                    $categories = \App\Models\Categories::where([['is_public',1],['id',$categoryId]])->first();
                    $list->category = $categories->name;
                }
                else
                {
                    $list->category = 'Empty';
                }
                           
                $count_comment = \App\Models\Comments::where([['blogId',$list->id]])->count();
                $count_reply = \App\Models\Replies::where([['blogId',$list->id]])->count();
                $count_vote = \App\Models\Likes::where([['blogId',$list->id]])->count();
                $list->votes = $count_vote;
                $list->comments =($count_comment + $count_reply);
                
                $favorite->list = $list;
    
            }  
            return view('user.favorites',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks, 'favorites'=>$favorites]);
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
                $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
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
            $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('user.messages',['categories'=>$categories,'count_bookmarks'=>$count_bookmarks]);
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
                $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
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
                $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
            }
            else
            {
                $count_bookmarks = 0;
            }
            return view('user.following',['categories'=>$categories , 'profile'=>$profile , 'user'=>$user, 'count_bookmarks'=>$count_bookmarks]);
        }
    }
}





