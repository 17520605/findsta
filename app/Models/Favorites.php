<?php namespace App\Models;

class Favorites extends BaseModel {
    
    protected $table = 'favorites';
    protected $fillable = [
        'id',
        'userId',
        'blogId',
        'created_at',
        'updated_at',
    ];
}
