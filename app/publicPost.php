<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicPost extends Model
{
    protected $fillable = ['user_id', 'post', 'image', 'view', 'comment', 'code'];


	
	
	
}
