<?php

namespace SmartHospital\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SmartHospital\Models\System\Menu;
use SmartHospital\Models\System\MexicoState;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('spa');
    }
    
    public function show() {
	    $data = [
		    'user' => [
			    'name' => Auth::user()->name,
			    'mainHeader' => [
				    'weather' => 'true',
				    'events' => 'false',
				    'messages' => 'false',
			    ]
		    ],
		    'mexicoStates' => MexicoState::select('id','federal_entity as label')->get(),
		    'menu' => $this->getMenu(),
		    'locale' => $this->getLocale(),
		    'routes' => $this->getRoutes(),
	    ];
	
	    return $data;
    }
    
    private function getRoutes()
    {
        return [
            'cmms' => [
            	'brands' => '/web/cmms/brands'
            ]
        ];
    }
    
    private function getLocale()
    {
        return [
        	'system' => trans('system'),
        ];
    }
	
	private function getMenu() {
		$userPermissions = auth()->user()->getAllPermissions();
		$viewPermissions = [];
		foreach ($userPermissions as $permission){
			if(strpos($permission, 'Ver') !== false){
				array_push($viewPermissions, $permission['id']);
			}
		}
		$model =  Menu::where('parent_id', '=', null)->select('id','name','icon','path','permission_id')->with('childs')->get()->toArray();
		foreach ($model as $keya=>$parent){
			foreach ($parent['childs'] as $keyb=>$child){
				if(!in_array($child['permission_id'], $viewPermissions)){
					unset($model[$keya]['childs'][$keyb]);
				}
			}
		}
		return $model;
    }
}
