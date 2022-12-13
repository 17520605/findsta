<?php namespace App\Models;


class Contacts extends BaseModel {
    
    protected $table = 'contacts';

    protected $fillable = [
       'id',
       'name',
       'phone',
       'email',
       'content',
       'status',
       'created_at',
       'updated_at'
    ];
}
