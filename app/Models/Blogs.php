<?php namespace App\Models;

class Blogs extends BaseModel {
    
    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'categoryId',
        'fileId',
        'title',
        'slug',
        'type',
        'desc',
        'content',
        'author',
        'is_public',
        'created_at',
        'updated_at'
    ];
}
