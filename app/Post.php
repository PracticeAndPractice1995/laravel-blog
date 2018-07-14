<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
    	'title',
    	'body',
    	'image_link',
    	'user_id',
    	'published'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
