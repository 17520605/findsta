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

    function number_format_short( $n ) {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }
        else
        {
            $n_format = $n;
            $suffix = '';
        }
    
        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }

    function timeFromNow($date){
        return moment($date).fromNow(true);
     }
}
