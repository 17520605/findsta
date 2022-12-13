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
            $this->countView($blog->id);
            // get previous user id
            $previousId = \App\Models\Blogs::where([['id', '<', $id],['is_public', '=' , 1]])->max('id');
            $blogPrevious = \App\Models\Blogs::where([['id',$previousId]])->first();
            $previous = $blogPrevious;
            // get next user id
            $nextId = \App\Models\Blogs::where([['id', '>', $id],['is_public', '=' , 1]])->min('id');
            $blogNext = \App\Models\Blogs::where([['id',$nextId]])->first();
            $next = $blogNext;

            if($lang)           
            {
                $relateds = \App\Models\Blogs::where([['is_public','=',1],['id','!=',$id],['categoryId', '=' , $blog->categoryId]])->orderby('id', 'DESC')->offset(0)->limit(4)->get();
            }
            else
            {
                $lang = 'en';
                $relateds = \App\Models\Blogs::where([['is_public','=',1],['id','!=',$id],['categoryId', '=' , $blog->categoryId]])->orderby('id', 'DESC')->offset(0)->limit(4)->get();
            }
            foreach ($relateds as $related) {
                $bannerId = $related->bannerId;
                if($bannerId)
                {
                    $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                    $related->thumbnail = $poster->thumbnail;
                }
                else
                {
                    $fileId = $related->fileId;
                    $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                    $related->thumbnail = $poster->thumbnail;
                }
                $categoryId = $related->categoryId;
                if($categoryId)
                {
                    $categories = \App\Models\Categories::where([['is_public',1],['id',$categoryId]])->first();
                    $related->category = $categories->name;
                }
                else
                {
                    $related->category = 'Empty';
                }
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
        return view('detail.index', ['categories'=>$categories, 'topvideos'=>$topvideos, 'blog'=>$blog,'previous'=>$previous,'next'=>$next ,'relateds'=>$relateds]);
    }
}
