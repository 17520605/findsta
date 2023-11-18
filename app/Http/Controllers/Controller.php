<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            $profile = null;
            
            if($user != null){
                $profile = DB::table('profile')->where('userId', $user->id)->first();
            }
            
            return $next($request);
        });
    }

    public function uploadFile($file, $isUsed = false, $folder ,$type)
    {
        $data1 = 'cryptonexnews';
        $data2 = $folder;
        $root = $data1 . '/' . $data2;
        $path = Storage::disk('temp')->putFile('/', $file);
        $res = cloudinary()->upload(Storage::disk('temp')->path($file->hashName()), [
            'folder'=> $root,
            'resource_type' => 'auto'
        ])->getResponse();
        
        // delete file
        $path = Storage::disk('temp')->delete($path);
        $resObj = json_decode(json_encode($res));
        // save asset
        $files = new \App\Models\Files();
        $files->name = $file->getClientOriginalName();
        if($type === 'audio')
        {
            $background_audio = 'https://res.cloudinary.com/dsldtailo/image/upload/v1669107824/asset-default/shortwave_slide-f48bdaffdf7bd69ed210adb259371a937a4626bc-s1100-c50_xbadmr.jpg';
            $files->thumbnail = $background_audio;
        }
        else if($type === 'image')
        {
            if(strpos($resObj->url, 'res.cloudinary.com/virtual-tour/image/upload/') >= 0){
                $miniUrl = str_replace('upload/', 'upload/c_thumb,w_350,g_face/', $resObj->url);
            }
            else
            {
                $miniUrl = $resObj->url;
            }
            $files->thumbnailMini = $miniUrl;
            $files->thumbnail = $resObj->url;
        }
        else
        {
            if(strpos($resObj->url, 'res.cloudinary.com/virtual-tour/image/upload/') >= 0){
                $miniUrl = str_replace('upload/', 'upload/c_thumb,w_350,g_face/', $resObj->url);
            }
            else
            {
                $miniUrl = $resObj->url;
            }
            $files->thumbnailMini = $miniUrl;
            $files->thumbnail = $resObj->url;
        }
        $files->url = $resObj->url;
        $files->type = $resObj->type;
        $files->source = $resObj->resource_type;
        $files->desc = $resObj->asset_id;
        $files->format = $file->getClientOriginalExtension();
        $files->width = $resObj->width;
        $files->height = $resObj->height;
        $files->size = $resObj->bytes;
        $files->save();
        $filesId = $files->id;
        $resObj->filesId = $filesId;
        return $resObj;
    }

    public function countView($id)
    {
        $blog = \App\Models\Blogs::where('id', $id)->first();
        if(isset($blog)){
            $blog->viewer = ($blog->viewer + 1);
            $saved = $blog->save();
        }
    }


}
