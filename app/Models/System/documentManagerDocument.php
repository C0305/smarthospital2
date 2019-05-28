<?php

namespace SmartHospital\Models\System;

use Illuminate\Database\Eloquent\Model;

class documentManagerDocument extends Model
{
    protected $fillable = [
    	'name',
	    'size',
	    'route',
	    'user_id',
	    'model_id',
	    'model_type',
	    'document_type',
	    'uid'
    ];
}
