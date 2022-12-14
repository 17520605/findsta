<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cache;
use Session;
class FeedbackController extends Controller
{
    public function index()
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
        }
        else
        {
            $profile = [];
        }
        $categories = \App\Models\Categories::where([['is_public',1]])->orderby('id', 'DESC')->get(); 
        if($userId){
            $count_bookmarks = \App\Models\bookmarks::where([['userId',$userId]])->count();
        }
        else
        {
            $count_bookmarks = 0;
        }
        return view('feedback.index',['categories'=>$categories , 'profile'=> $profile, 'count_bookmarks'=>$count_bookmarks]);
    }

    public function postFeedback(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $content = $request->input('content');

        $contacts = new \App\Models\Contacts();
        $contacts->name = $name;
        $contacts->email =  $email;
        $contacts->content = $content;
        $saved = $contacts->save();
        if(isset($saved))
        {
            return response()->json([
                'result' => 'ok',
                'message' => "Send feedback success !"
            ], 200);
        }
        else{
            return response()->json([
                'result' => 'fail',
                'message' => "Send feedback wrong!"
            ], 200);
        }
    } 
}
