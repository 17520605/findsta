<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cache;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $lang = Session::get('language'); 
        $userId = get_data_user('web');
        if($lang)           
        {
            //['lang', $lang],
            $features = \App\Models\Blogs::where([['feature',0],['is_public',1]])->orderby('id', 'DESC')->offset(0)->limit(10)->get();
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->get();
        }
        else
        {
            $lang = 'en';
            $features = \App\Models\Blogs::where([['feature',0],['is_public',1]])->orderby('id', 'DESC')->offset(0)->limit(10)->get();
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->get();
        }
        foreach ($features as $feature) {
            $bannerId = $feature->bannerId;
            if($bannerId)
            {
                $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                $feature->thumbnail = $poster->thumbnail;
            }
            else
            {
                $fileId = $feature->fileId;
                $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                $feature->thumbnail = $poster->thumbnail;
            }
        }  
        foreach ($lists as $list) {
            $bannerId = $list->bannerId;
            if($userId)
            {
                $bookmark = \App\Models\bookmarks::where([['userId',$userId],['blogId',$list->id]])->first();
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
            $categoryId = $list->categoryId;
            if($categoryId)
            {
                $categories = \App\Models\Categories::where([['is_public',1],['id',$categoryId]])->first();
                $list->category = $categories->name;
            }
            else
            {
                $list->category = 'Empty';
            }
           

        }  
        $topvideos = \App\Models\Blogs::where([['is_public',1],['type','video']])->orderby('id', 'DESC')->offset(0)->limit(5)->get();
        foreach ($topvideos as $topvideo) {
            $bannerId = $topvideo->bannerId;
            if($bannerId)
            {
                $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                $topvideo->thumbnail = $poster->thumbnail;
            }
            else
            {
                $fileId = $topvideo->fileId;
                $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                $topvideo->thumbnail = $poster->thumbnail;
            }
        }  
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        if($userId){
            $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('home.index', ['features'=> $features , 'categories'=>$categories, 'lists'=>$lists, 'topvideos'=>$topvideos , 'count_bookmarks'=>$count_bookmarks]);
    }
    public function changeLanguage($language)
    {
        if($language)
        {        
            Session::put('language', $language);
        }

        return redirect()->back();
    }
    public function bookmark($blogId,Request $request)
    {
        $userId = get_data_user('web');
        if($userId){
            $bookmark = \App\Models\Bookmarks::where([['userId', $userId],['blogId', $blogId]])->first();
            if(isset($bookmark))
            {
                $deleted = $bookmark->delete();
                // if(isset($deleted))
                // {
                //     return response()->json([
                //         'result' => 'ok',
                //         'status' => 'delete',
                //         'message' => "Remove bookmark success !"
                //     ], 100);
                // }
                // else{
                //     return response()->json([
                //         'result' => 'fail',
                //         'status' => 'delete',
                //         'message' => "Remove bookmark false !"
                //     ], 100);
                // }
            }
            else
            {
                $bookmarks = new \App\Models\Bookmarks();
                $bookmarks->userId = $userId;
                $bookmarks->blogId = $blogId;
                $saved = $bookmarks->save();
                // if(isset($saved))
                // {
                //     return response()->json([
                //         'result' => 'ok',
                //         'status' => 'add',
                //         'message' => "Add bookmark success !"
                //     ], 100);
                // }
                // else{
                //     return response()->json([
                //         'result' => 'fail',
                //         'status' => 'add',
                //         'message' => "Add bookmark false !"
                //     ], 100);
                // }
            }
        
        }
        return redirect()->back();
    }

    public function bookmarkList($language)
    {
        if($language)
        {        
            Session::put('language', $language);
        }

        return redirect()->back();
    }
    
}
