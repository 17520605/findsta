<?php namespace App\Models;

class Comments extends BaseModel {
    
    protected $table = 'comments';
    protected $fillable = [
        'id',
        'userId',
        'name',
        'email',
        'message',
        'created_at',
        'updated_at'
    ];
}

