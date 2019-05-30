<?php

namespace SmartHospital\Http\Controllers\CMMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SmartHospital\Http\Controllers\Controller;
use SmartHospital\Http\Traits\Search\NormalSearch;
use SmartHospital\Models\CMMS\CmmsModel;
use Illuminate\Support\Facades\Log;


use SmartHospital\Http\Traits\Files\FileTrait;

class ModelController extends Controller
{
    use NormalSearch;
    use FileTrait;
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
	        'brand_id',
	        'description',
	        'subcategory_id',
	        'category_id',
	        'rfaac',
	        'voltage',
	        'website'
        )->with('files');
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
		
		
        $oldDocuments = $data['files'];
        $oldImage = $data['image'];

        unset( $data['files']);

        $documents = $this->generateDocumentsArray( $oldDocuments, 'cmms/model/');

        DB::beginTransaction();
        try {
            $data['image'] = $this->trimAndMove( $data['image'], 'cmms/model/');
            $model = CmmsModel::updateOrCreate(['id' => $data['id']], $data);
            Log::info( 'si llega aqui antes de $this->saveFiles( $documents, $model);');
            $this->saveFiles( $documents, $model);
            DB::commit();
            return $model->id;
        } catch(\Exception $e) {
            DB::rollBack();
            return [
                'Error' => $e,
                'FilesMove' => $this->filesRollback($oldDocuments, ['tmp/', 'cmms/model/']),
                'FileMove' => $this->fileRollback($oldImage,['tmp/', 'cmms/model/'])
            ];
        }
    }
    
    
}
