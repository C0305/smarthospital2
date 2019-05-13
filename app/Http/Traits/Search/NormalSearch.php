<?php
	
	
	namespace SmartHospital\Http\Traits\Search;
	
	
	trait NormalSearch
	{
		public function searchLike($model, $array, $notArray = []) {
			$excludeFromSearch = ['page','pageSize','undefined'];
			$excludeFromSearch = array_merge($excludeFromSearch,$notArray);
			foreach ($array as $key => $value) {
				if(!in_array($key,$excludeFromSearch) && !empty($value)){
					$model->where($key, 'LIKE', '%'.$value.'%');
				}
			}
			return $model;
		}
	}