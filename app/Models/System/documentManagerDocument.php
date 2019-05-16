<?php

namespace SmartHospital\Models\System;

use Illuminate\Database\Eloquent\Model;

class documentManagerDocument extends Model
{
    protected $fillable = [
    	'name',
	    'document',
	    'description',
	    'route',
	    'url',
	    'type',
	    'user_id'
    ];
}
