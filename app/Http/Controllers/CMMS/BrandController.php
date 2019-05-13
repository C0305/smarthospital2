<?php

namespace SmartHospital\Http\Controllers\CMMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SmartHospital\Http\Controllers\Controller;
use SmartHospital\Http\Traits\Search\NormalSearch;
use SmartHospital\Models\CMMS\Brand;

class BrandController extends Controller
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
        $brands = Brand::select(
        	'id',
	        'name',
	        'website',
	        'notes'
        );
        
        
        
        $brands = $this->searchLike($brands,$this->request->all());
        
        return $brands->paginate($this->request->get('pageSize'));
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
    public function store()
    {
        return $this->updateOrCreate($this->request->all());
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        	$model = Brand::find($id);
	        $model->delete();
	        DB::commit();
        } catch (\Exception $e) {
	        DB::rollBack();
	        return $e;
        }
    }
    
    private function updateOrCreate($data){
	    return Brand::updateOrCreate(['id' => $data['id']],$data);
    }
    
    
}
