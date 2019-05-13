<?php

namespace SmartHospital\Models\CMMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmmsModelDocument extends Model
{
    use SoftDeletes;
    
    private $fillable = [
    	'name',
	    'url',
	    'note',
	    'model_id'
    ];
    
    
}
