<?php namespace App\Models;

class Categories extends BaseModel {
    
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'icon',
        'color',
        'desc',
        'is_public',
        'created_at',
        'updated_at',
    ];
}
