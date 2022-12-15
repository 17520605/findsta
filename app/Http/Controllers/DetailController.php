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
        $userId = get_data_user('web');
        if($slug)
        {
            $blog = \App\Models\Blogs::where([['is_public',1],['id',$id],['slug',$slug]])->first(); 
            if($blog->tags)
            {
                $array = explode(',', $blog->tags );
            }
            else
            {
                $array = [];
            }
            $fileBlog = \App\Models\Files::where('id', '=', $blog->fileId)->first();
            $bannerBlog = \App\Models\Files::where('id', '=', $blog->bannerId)->first();
            $blog->thumbnail = $fileBlog->thumbnail;
            $blog->poster = $bannerBlog->thumbnail;
            $blog->src = $fileBlog->url;
            $blog->source = $fileBlog->source;
            $comments = \App\Models\Comments::where([['blogId', $blog->id]])->orderby('id', 'DESC')->offset(0)->limit(10)->get();
            foreach ($comments as $comment) {
                $commentuserId = $comment->userId;
                if($commentuserId)
                {
                    $profile = \App\Models\Profile::where('userId',  $commentuserId)->first();
                    $avatarId = $profile->avatarId;
                    if($avatarId != null || $avatarId != '')
                    {
                        $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                        $profile->avatar = $avatar->miniUrl();
                        
                    }else
                    {
                        $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
                    }
                    $comment->profile = $profile;
                }else{
                    $avatar = 'https://ui-avatars.com/api/?name='.$comment->name.'&background=random&rounded=true';
                    $comment->avatar = $avatar;
                }
                $replies = \App\Models\Replies::where([['commentId', $comment->id]])->orderby('id', 'DESC')->get();
                foreach ($replies as $reply) {
                    $replyuserId = $reply->userId;
                    if($replyuserId)
                    {
                        $profile = \App\Models\Profile::where('userId',  $replyuserId)->first();
                        $avatarId = $profile->avatarId;
                        if($avatarId != null || $avatarId != '')
                        {
                            $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                            $profile->avatar = $avatar->miniUrl();
                            
                        }else
                        {
                            $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
                        }
                        $reply->profile = $profile;
                    }
                    else
                    {
                        $avatar = 'https://ui-avatars.com/api/?name='.$reply->name.'&background=random&rounded=true';
                        $reply->avatar = $avatar;
                    }
                }  
                $comment->reply = $replies;
        
            }  
            $likecount = \App\Models\Likes::where([['blogId',$blog->id]])->count();
            if($userId)
            {
                $bookmark = \App\Models\Bookmarks::where([['userId',$userId],['blogId',$blog->id]])->first();
                if($bookmark)
                {
                    $blog->bookmark = true;
                }
                else
                {
                    $blog->bookmark = false;
                }
                $favorite = \App\Models\Favorites::where([['userId',$userId],['blogId',$blog->id]])->first();
                if($favorite)
                {
                    $blog->favorite = true;
                }
                else
                {
                    $blog->favorite = false;
                }
                $like = \App\Models\Likes::where([['userId',$userId],['blogId',$blog->id]])->first();
                if($like)
                {
                    $blog->like = true;
                    $blog->likecount = $likecount;
                }
                else
                {
                    $blog->like = false;
                    $blog->likecount = $likecount;
                }
            }else
            {
                $blog->bookmark = false;
                $blog->favorite = false;
                $blog->like = false;
                $blog->likecount = $likecount;
            }
            
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
        if($userId){
            $count_bookmarks = \App\Models\Bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('detail.index', ['categories'=>$categories, 'topvideos'=>$topvideos, 'blog'=>$blog,'previous'=>$previous,'next'=>$next ,'relateds'=>$relateds, 'count_bookmarks'=>$count_bookmarks , 'comments'=>$comments]);
    }
    public function addcomment($blogId,Request $request)
    {
        $userId = get_data_user('web');
        $message = $request->input('message');
        if($userId){
            $profile = \App\Models\Profile::where([['userId', $userId]])->first();
            $commnet = new \App\Models\Comments();
            $commnet->userId = $profile->userId;
            $commnet->blogId = $blogId;
            $commnet->name = $profile->fname.' '.$profile->lname;
            $commnet->email = $profile->email;
            $commnet->message = $message;
            $saved = $commnet->save();
            if(isset($saved))
            {
                $comments = \App\Models\Comments::where([['blogId', $blogId]])->orderby('id', 'DESC')->offset(0)->limit(10)->get();
                return response()->json([
                    'success' => true,
                    'comments' => $comments,
                ]);
            }
        }else
        {
            $message = $request->input('message');
            $name = $request->input('name');
            $email = $request->input('email');
            $commnet = new \App\Models\Comments();
            $commnet->blogId = $blogId;
            $commnet->name = $name;
            $commnet->email = $email;
            $commnet->message = $message;
            $saved = $commnet->save();
            if(isset($saved))
            {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
    public function removecomment(Request $request)
    {
        $commentId = $request->input('commentId');
        $comment = \App\Models\Comments::where([['id', $commentId]])->first();
        if(isset($comment))
        {
            $deleted = $comment->delete();
            if(isset($deleted))
            {
                return redirect()->back();
            }
        }
        return false;
    }
    public function addreply($blogId,Request $request)
    {
        $userId = get_data_user('web');
        $commentId = $request->input('commentId');
        $message = $request->input('message');
        if($userId){
            $profile = \App\Models\Profile::where([['userId', $userId]])->first();
            $replies = new \App\Models\Replies();
            $replies->userId = $profile->userId;
            $replies->commentId = $commentId;
            $replies->blogId = $blogId;
            $replies->name = $profile->fname.' '.$profile->lname;
            $replies->email = $profile->email;
            $replies->message = $message;
            $saved = $replies->save();
            if(isset($saved))
            {
                return response()->json([
                    'success' => true,
                ]);
            }
        }else
        {
            $message = $request->input('message');
            $name = $request->input('name');
            $email = $request->input('email');
            $replies = new \App\Models\Replies();
            $replies->blogId = $blogId;
            $replies->commentId = $commentId;
            $replies->name = $name;
            $replies->email = $email;
            $replies->message = $message;
            $saved = $replies->save();
            if(isset($saved))
            {
                return response()->json([
                    'success' => true,
                ]);
            }
        }
        return redirect()->back();
    }
    public function removereply(Request $request)
    {
        $replyId = $request->input('replyId');
        $reply = \App\Models\Replies::where([['id', $replyId]])->first();
        if(isset($reply))
        {
            $deleted = $reply->delete();
            if(isset($deleted))
            {
                return redirect()->back();
            }
        }
        return false;
    }
    public function like($blogId,Request $request)
    {
        $userId = get_data_user('web');
        if($userId){
            $like = \App\Models\Likes::where([['userId', $userId],['blogId', $blogId]])->first();
            if(isset($like))
            {
                $liked = $like->delete();
                if(isset($liked))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'disklike',
                    )); 
                }
            }
            else
            {
                $like = new \App\Models\Likes();
                $like->userId = $userId;
                $like->blogId = $blogId;
                $saved = $like->save();
                if(isset($saved))
                {
                    return response()->json(array(
                        'success' => true,
                        'status' => 'like',
                    )); 
                }
                
            }
             
        
        }
        return redirect()->back();
    }
}
