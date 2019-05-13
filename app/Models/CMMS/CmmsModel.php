<?php

namespace SmartHospital\Models\CMMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CmmsModel extends Model
{
	use SoftDeletes;
	
	private $fillable = [
    	'image',
	    'name',
	    'model',
	    'brand_id',
	    'description',
	    'subcategory_id',
	    'category_id',
	    'rfaac',
	    'hospital_id',
	    'voltage',
	    'website',
	];
}
