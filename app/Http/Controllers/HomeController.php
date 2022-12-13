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
        return view('home.index', ['features'=> $features , 'categories'=>$categories, 'lists'=>$lists, 'topvideos'=>$topvideos]);
    }
    public function changeLanguage($language)
    {
        if($language)
        {        
            Session::put('language', $language);
        }

        return redirect()->back();
    }
}
