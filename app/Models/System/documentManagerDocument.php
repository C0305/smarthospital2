<?php

namespace SmartHospital\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class documentManagerDocument extends Model
{
    use SoftDeletes;
    
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
