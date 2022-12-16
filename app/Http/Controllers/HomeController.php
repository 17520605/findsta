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
    public function index(Request $request)
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
            $count_comment = \App\Models\Comments::where([['blogId',$feature->id]])->count();
            $count_reply = \App\Models\Replies::where([['blogId',$feature->id]])->count();
            $count_vote = \App\Models\Likes::where([['blogId',$feature->id]])->count();
            $feature->votes = $count_vote;
            $feature->comments =($count_comment + $count_reply);
        }  
        foreach ($lists as $list) {
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
        $lenght = 12;
        $page = intval($request->query('page')) >= 1 ? intval($request->query('page')) : 1;
        // check page
        $pageCount = ceil(count($lists)/$lenght);
        if($page > $pageCount){
            $page = 1;
        };

        $lists = $lists->skip(($page-1)*$lenght)->take($lenght);

        // pagination
        $pagination = [
            'first' => (($page - 2) > 0 ? ($page - 3) : 1),
            'last' => (($page + 2) <= $pageCount ? ($page + 2) :  $pageCount),
            'current' => $page,
            'prev' => (($page-1) > 0 ? ($page-1) : false),
            'next' => (($page+1) <= $pageCount ? ($page+1) : false),
        ];

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
            $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('home.index', ['features'=> $features , 'categories'=>$categories, 'lists'=>$lists, 'topvideos'=>$topvideos , 'count_bookmarks'=>$count_bookmarks , 'pagination' => $pagination]);
    }
    public function loadmore()
    {
        $lang = Session::get('language');
        $userId = get_data_user('web');
        if($lang)           
        {
            //['lang', $lang],
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->take(15)->get();
        }
        else
        {
            $lang = 'en';
            $lists = \App\Models\Blogs::where([['is_public',1]])->orderby('id', 'DESC')->take(15)->get();
        }
        foreach ($lists as $list) {
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

        $output = ``;
        foreach($lists as $key => $list)
        {
            $lastId = $list->id;
            $output.= '
                <div class="box king-q-list-item" id="q'.$list->id.'">
                    <div class="king-post-upbtn">
                        <a href="{{ env("APP_URL") }}/'.$list->id.'/'.$list->slug.'" class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="{{__("tooltip_quick_view")}}">
                            <i class="fa-solid fa-chevron-up"></i>
                        </a>
                        @if (Auth::check())
                        <a
                            href="javascript:void(0)"
                            class="king-readlater '.$list->bookmark ? "selected" : "".'"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="{{__("tooltip_bookmark")}}"
                            data-bookmarkid="'.$list->id.'"
                            onclick="return bookmark(this);"
                        >
                            <i class="far fa-bookmark"></i>
                        </a>
                        @endif
                        <a href="{{ env("APP_URL") }}/'.$list->id.'/'.$list->slug.'" class="ajax-popup-share magnefic-button" data-toggle="tooltip" data-placement="right" title="{{__("tooltip_share")}}"><i class="fas fa-share-alt"></i></a>
                    </div>
                    <div class="king-q-item-main">
                        <a class="item-a" href="{{ env("APP_URL") }}/'.$list->id.'/'.$list->slug.'">
                            <span class="post-featured-img"><img class="item-img king-lazy" width="800" height="auto" data-king-img-src="'.$list->thumbnail.'" alt="" /></span>
                        </a>
                        <div class="king-post-content">
                            <div class="king-q-item-title">
                                <div class="king-title-up">
                                    @if ('.$list->type.' === "video")
                                    <a class="king-post-format" href="{{ env("APP_URL") }}/videos"><i class="fas fa-video"></i> Video</a>
                                    @elseif ('.$list->type.' === "image")
                                    <a class="king-post-format" href="{{ env("APP_URL") }}/images"><i class="fas fa-image"></i> Image</a>
                                    @elseif ('.$list->type.' === "audio")
                                    <a class="king-post-format" href="{{ env("APP_URL") }}/images"><i class="fa-solid fa-headphones"></i> Audio</a>
                                    @endif
                                    <a class="king-post-format" href="{{ env("APP_URL") }}/news"><i class="fas fa-newspaper"></i> News</a>
                                    <span class="metah-where">
                                        <span class="metah-where-data"><a href="{{ env("APP_URL") }}/category/'.$list->category .'" class="king-category-link">'.$list->category .'</a></span>
                                    </span>
                                </div>
                                <a href="{{ env("APP_URL") }}/'.$list->id.'/'.$list->slug.'">
                                    <h2 style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        '.$list->title.'
                                    </h2>
                                </a>
                            </div>
                            <div class="post-meta">
                                <div class="king-p-who">
                                    <img data-king-img-src="https://ui-avatars.com/api/?name='.$list->author.'&background=random&rounded=true" class="king-avatar king-lazy" width="27" height="27" />
                                    <a href="#" class="king-user-link">'.$list->author.'</a>
                                </div>
                                <div>
                                    <span><i class="fa fa-comment" aria-hidden="true"></i> '.$list->comments.'</span>
                                    <span><i class="fa fa-eye" aria-hidden="true"></i> '.$list->viewer.'</span>
                                    <span><i class="fas fa-chevron-up"></i> '.$list->votes.'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
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
                if(isset($deleted))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'delete',
                    )); 
                }
            }
            else
            {
                $bookmarks = new \App\Models\Bookmarks();
                $bookmarks->userId = $userId;
                $bookmarks->blogId = $blogId;
                $saved = $bookmarks->save();
                if(isset($saved))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'add',
                    )); 
                }
                
            }
             
        
        }
        return redirect()->back();
    }

    public function bookmarkList()
    {
        $userId = get_data_user('web');
        if($userId)
        {        
            $bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->orderby('id', 'DESC')->get();
            if($bookmarks)
            {
                foreach($bookmarks as $bookmark)
                {
                    $blog = \App\Models\Blogs::where([['id',$bookmark->blogId]])->first();
                    if($blog)
                    {
                        $bannerId = $blog->bannerId;
                        if($bannerId)
                        {
                            $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                            $blog->thumbnail = $poster->thumbnail;
                            $blog->src = $poster->url;
                        }
                        else
                        {
                            $fileId = $blog->fileId;
                            $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                            $blog->thumbnail = $poster->thumbnail;
                            $blog->src = $poster->url;
                        }
                        $bookmark->blog = $blog;
                    }
                    
                }
            }
        }

        return $bookmarks;
    }
    
    public function favorite($blogId,Request $request)
    {
        $userId = get_data_user('web');
        if($userId){
            $favorite = \App\Models\Favorites::where([['userId', $userId],['blogId', $blogId]])->first();
            if(isset($favorite))
            {
                $deleted = $favorite->delete();
                if(isset($deleted))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'delete',
                    )); 
                }
            }
            else
            {
                $favorites = new \App\Models\Favorites();
                $favorites->userId = $userId;
                $favorites->blogId = $blogId;
                $saved = $favorites->save();
                if(isset($saved))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'add',
                    )); 
                }
            }
        
        }
        return redirect()->back();
    }

    public function favoriteList()
    {
        $userId = get_data_user('web');
        if($userId)
        {        
            $favorites = \App\Models\Favorites::where([['userId',$userId]])->orderby('id', 'DESC')->get();
            if($favorites)
            {
                foreach($favorites as $favorite)
                {
                    $blog = \App\Models\Favorites::where([['id',$favorite->blogId]])->first();
                    if($blog)
                    {
                        $bannerId = $blog->bannerId;
                        if($bannerId)
                        {
                            $poster = \App\Models\Files::where('id', '=', $bannerId)->first();
                            $blog->thumbnail = $poster->thumbnail;
                            $blog->src = $poster->url;
                        }
                        else
                        {
                            $fileId = $blog->fileId;
                            $poster = \App\Models\Files::where('id', '=', $fileId)->first();
                            $blog->thumbnail = $poster->thumbnail;
                            $blog->src = $poster->url;
                        }
                        $favorite->blog = $blog;
                    }
                    
                }
            }
        }

        return $favorites;
    }
    
}
