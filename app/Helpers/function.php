<?php
if (!function_exists('get_data_user')) 
{
    function get_data_user($type, $field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }

    function get_info_user($id, $field = 'id')
    {
        if ($id)
        {
            $user = \App\Models\User::where([['is_deleted','0'],['id',$id]])->first();
            if(isset($user))
            {
                $profile = \App\Models\Profile::where('userId',  $user->id)->first();
                if($field === 'name')
                {
                    $profile->name = $profile->fname.' '.$profile->lname;
                }
               
                $avatarId = $profile->avatarId;
                if($avatarId != null || $avatarId != '')
                {
                    $avatar = \App\Models\Files::where('id', '=', $avatarId)->first();
                    $profile->avatar = $avatar->miniUrl();
                    
                }else
                {
                    $profile->avatar = 'https://ui-avatars.com/api/?name='.$profile->lname.' '.$profile->fname.'&background=random&rounded=true';
                }
            }
            return $profile ? $profile->$field : '';
        }
        // return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}
