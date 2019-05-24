<?php

namespace SmartHospital\Http\Controllers\CMMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SmartHospital\Http\Controllers\Controller;
use SmartHospital\Http\Traits\Search\NormalSearch;
use SmartHospital\Models\CMMS\CmmsModel;
use SmartHospital\Models\CMMS\CmmsModelDocument;

class ModelController extends Controller
{
	use NormalSearch;
	private $request;
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CmmsModel::select(
        	'id',
	        'image',
	        'name',
	        'model',
	        'brand_id',
	        'description',
	        'subcategory_id',
	        'category_id',
	        'rfaac',
	        'voltage',
	        'website'
        );
        $noSearch = ['image'];
	    $models = $this->searchLike($models,$this->request->all(),$noSearch);
	    return $models->paginate($this->request->get('pageSize'));
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
	    return $this->updateOrCreate($this->request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    DB::beginTransaction();
	    try{
		    $model = CmmsModel::find($id);
		    $model->delete();
		    DB::commit();
	    } catch (\Exception $e) {
		    DB::rollBack();
		    return $e;
	    }
    }
	
	private function updateOrCreate($data){
    	
    	$documents = $data['documents'];
    	unset($data['documents']);
    	$model = CmmsModel::updateOrCreate(['id' => $data['id']],$data);
    	foreach ($documents as $doc) {
    		$doc['model_id'] = $model;
    		CmmsModelDocument::updateOrCreate(['id' => $doc['id']],$doc);
		}

		return $model;
	}
}
