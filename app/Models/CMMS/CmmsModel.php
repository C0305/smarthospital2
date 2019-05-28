<?php

namespace SmartHospital\Models\CMMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CmmsModel extends Model
{
	use SoftDeletes;
	
	protected $fillable = [
	    'name',
        'image',
	    'brand_id',
	    'description',
	    'subcategory_id',
	    'category_id',
	    'rfaac',
	    'voltage',
	    'website',
	];
}
