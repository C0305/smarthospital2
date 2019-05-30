<?php
	
	
	namespace SmartHospital\Http\Traits\Files;
    
    
    use SmartHospital\Http\Controllers\System\UploadFiles;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;


trait FileTrait
	{

        /**
         * funcion que hace rollback en los archivos
         * $routes es un array el primer elemento es la primer ruta
         * generalmente es 'tmp/' y el segundo elemento es la ruta a la 
         * cual se iban a mover los archivos
         */
        private function filesRollback($requestArray, $routes)
        {
            try{
                foreach ($requestArray as $document) {
                    $trimmed = str_replace('tmp/', '', $document['response']);
                    UploadFiles::update('move', $routes[1].$trimmed,  $routes[0].$trimmed);
                }
            } catch (\Exception $e) {
                return $e;
            }
        }

        /**
         * Funcion que permite el rollback de los archivos y asi regresarlos
         * a la carpeta temporal
         */
        private function fileRollback($oldFile,$routes)
        {
            try {
                $trimmed = str_replace('tmp/', '', $oldFile);
                UploadFiles::update('move', $routes[1].$trimmed, $routes[0].$trimmed);
            } catch (\Exception $e) {
                return $e;
            }
        }
        /**
         * Retorna la ruta del archivo que se movio
         * 
         */
        private function trimAndMove($file,$route)
        {
            if(is_array($file)){
                $oneRoute = $file['response'];
            } else {
                $oneRoute = $file;
            }
            try {
                $trimmed = str_replace('tmp/', '', $oneRoute);
                $uploader = new UploadFiles();
                $uploader->update('move', $oneRoute, $route.$trimmed);
                return $route.$trimmed;
            } catch (\Exception $e) {
                return $e;
            }
        }

        private function generateDocumentsArray( $oldDocuments, $route){
            $documents = array();
            foreach ($oldDocuments as $file) {

                array_push($documents, [
                    'name' => $file['name'],
                    'size' => $file['size'],
                    'route' => $this->trimAndMove($file, $route),
                    'user_id' => Auth::id(),
                    'document_type' => substr($file['name'], strrpos($file['name'], '.') + 1),
                    'uid' => $file['uid']
                ]);
            }
            
            return $documents;
        }

        private function saveFiles( $documents, $model)
        {
            Log::info('salvar archivo en la base de datos antes del try');
            try{
                foreach ($documents as $document) {
                    $document['model_id'] = $model->id;
                    $document['model_type'] = $model->getNamespaceName();
                    Log::info('After save file');
                    UploadFiles::update('saveOnDatabase', $document, null);

                }
            } catch(\Exception $e) {
                return $e;
            }
        }
	}