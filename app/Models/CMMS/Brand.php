<?php

namespace SmartHospital\Models\CMMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
	use SoftDeletes;
	protected $table = 'cmms_brands';
	protected $fillable = [
		'name',
		'website',
		'notes'
	];
	
	
}
