<?php namespace App\Models;

class Files extends BaseModel {
    
    protected $table = 'files';
    protected $fillable = [
        'id',
        'type',
        'source',
        'name',
        'desc',
        'url',
        'format',
        'width',
        'height',
        'size',
        'created_at',
        'updated_at'
    ];
    public function miniUrl()
    {
        if($this->url != null && $this->url != ""){
            if(strpos($this->url, 'res.cloudinary.com/virtual-tour/image/upload/') >= 0){
                $miniUrl = str_replace('upload/', 'upload/c_thumb,w_350,g_face/', $this->url);
                return $miniUrl;
            }
        }
        return $this->url;
    }
}
