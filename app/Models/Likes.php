<?php namespace App\Models;

class Likes extends BaseModel {
    
    protected $table = 'likes';
    protected $fillable = [
        'id',
        'userId',
        'blogId',
        'created_at',
        'updated_at'
    ];
}

