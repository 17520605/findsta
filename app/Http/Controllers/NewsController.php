<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cache;
use Session;
class NewsController extends Controller
{
    public function index()
    {
        $lang = Session::get('language'); 
        $userId = get_data_user('web');
        if($lang)           
        {
            //['lang', $lang],
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->get();
        }
        else
        {
            $lang = 'en';
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->get();
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
           
            $count_comment = \App\Models\Comments::where([['blogId',$list->id]])->count();
            $count_reply = \App\Models\Replies::where([['blogId',$list->id]])->count();
            $count_vote = \App\Models\Likes::where([['blogId',$list->id]])->count();
            $list->votes = $count_vote;
            $list->comments =($count_comment + $count_reply);
        }  
        $topvideos = \App\Models\Blogs::where([['is_public',1],['type','video']])->orderby('id', 'DESC')->offset(0)->limit(3)->get();
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
            $count_comment = \App\Models\Comments::where([['blogId',$topvideo->id]])->count();
            $count_reply = \App\Models\Replies::where([['blogId',$topvideo->id]])->count();
            $count_vote = \App\Models\Likes::where([['blogId',$topvideo->id]])->count();
            $topvideo->votes = $count_vote;
            $topvideo->comments =($count_comment + $count_reply);
        }  
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        if($userId){
            $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('news.index', ['categories'=>$categories, 'lists'=>$lists, 'topvideos'=>$topvideos, 'count_bookmarks'=>$count_bookmarks]);
    }
}
