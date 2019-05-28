<?php
	
	
	namespace SmartHospital\Http\Traits\Files;
    
    
    use SmartHospital\Http\Controllers\System\UploadFiles;
    use SmartHospital\Models\System\documentManagerDocument;
    use Illuminate\Support\Facades\Auth;

	
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
                    UploadFiles::update('move', $routes[1] + $trimmed, + $routes[0] + $trimmed);
                }
            } catch (\Exception $e) {
                return $e;
            }
        }

        private function fileRollback($oldFile,$routes){
            try {
                    $trimmed = str_replace('tmp/', '', $oldFile);
                    UploadFiles::update('move', $routes[1] + $trimmed, +$routes[0] + $trimmed);
            } catch (\Exception $e) {
                return $e;
            }
        }

        private function trimAndMove($file,$route)
        {
            try {
                $trimmed = str_replace('tmp/', '', $file['response']);
                UploadFiles::update('move', 'tmp/' + $trimmed, $route + $trimmed);
                return $route + $trimmed;
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
            try{
                foreach ($documents as $document) {
                    $document['model_id'] = $model->id;
                    $document['model_type'] = $model->getNamespaceName();
                    documentManagerDocument::updateOrCreate(['uid' => $document['uid']], $document);
                }
            } catch(\Exception $e) {
                return $e;
            }
        }
	}