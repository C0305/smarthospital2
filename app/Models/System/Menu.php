<?php

namespace SmartHospital\Models\System;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $table = 'menus';
	protected $fillable = [
		'name', 'icon', 'path', 'permission_id', 'parent_id'
	];
	public function childs(){
		return $this->hasMany( 'SmartHospital\Models\System\Menu', 'parent_id')
			->select('id', 'name', 'parent_id', 'icon', 'path as route', 'permission_id', 'parent_id');
	}
}
