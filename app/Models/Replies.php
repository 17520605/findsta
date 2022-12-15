<?php namespace App\Models;

class Replies extends BaseModel {
    protected $table = 'replies';
    protected $fillable = [
        'id',
        'commentId',
        'userId',
        'name',
        'email',
        'message',
        'created_at',
        'updated_at'
    ];
}

