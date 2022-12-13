<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class DetailController extends Controller
{
    public function index($id,$slug)
    {
        $lang = Session::get('language'); 
        if($slug)
        {
            $blog = \App\Models\Blogs::where([['is_public',1],['id',$id],['slug',$slug]])->first(); 
            $array = explode(',', $blog->tags );
            $fileBlog = \App\Models\Files::where('id', '=', $blog->fileId)->first();
            $bannerBlog = \App\Models\Files::where('id', '=', $blog->bannerId)->first();
            $blog->thumbnail = $fileBlog->thumbnail;
            $blog->poster = $bannerBlog->thumbnail;
            $blog->src = $fileBlog->url;
            $blog->source = $fileBlog->source;
            
            $blog->tags = $array;
           
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
        return view('detail.index', ['categories'=>$categories, 'topvideos'=>$topvideos, 'blog'=>$blog]);
    }
}
