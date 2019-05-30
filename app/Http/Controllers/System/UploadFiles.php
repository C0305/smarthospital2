<?php

namespace SmartHospital\Http\Controllers\System;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SmartHospital\Http\Controllers\Controller;
use SmartHospital\Models\System\documentManagerDocument ;
use Illuminate\Support\Facades\Log;


class UploadFiles extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response('Esta ruta solo es para subir archivos',409);
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
	    $path = Storage::disk('s3')->put('tmp', $request->file('file'),'public');
		return $path;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function update($action, $payloadOne, $payloadTwo)
    {
        Log::info( 'si entra aqui update');
        Log::info( $action);
        switch($action) {
            case 'move':
                Log::info('movee');
                return $this->moveOne($payloadOne, $payloadTwo = null);
            case 'saveOnDatabase':
                Log::info('save');
                return documentManagerDocument::updateOrCreate(['id' => $payloadOne['id']], $payloadOne);
            default:
                return 'nothing to do';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($deleteFiles)
    {
	    return Storage::disk('s3')->delete($deleteFiles);
    }
    
    private function moveOne($origin,$end)
    {
        Log::info( 'si entra aqui moveOne');
    	try{
            return Storage::disk('s3')->move($origin, $end);
        } catch (\Exception $e){
            return $e;
        }
    }

}
