<?php namespace App\Models;

class Bookmarks extends BaseModel {
    
    protected $table = 'bookmarks';
    protected $fillable = [
        'id',
        'userId',
        'blogId',
        'created_at',
        'updated_at',
    ];
}
