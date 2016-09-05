<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry; // se agrega para usar TableRegistry
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    public $max_files = 3;


    public function send( $data )
    {
      //debug($data);
    	if ( !empty( $data ) ) {
    		if ( count( $data ) > $this->max_files ) {
    			throw new InternalErrorException("Error Processing Request. Max number files accepted is {$this->max_files}", 1);
    		}

    		foreach ($data as $file) {
    			$filename = $file['name'];
    			$file_tmp_name = $file['tmp_name'];
          // Create a new folder with 0755 permissions
          //$dir = new Folder('/path/to/folder', true, 0755);
          $path = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          $folder = new Folder($path);
          if (is_null($folder->path)) {
              debug("no existe el directorio, pero lo creo ahora :) ");
              $dir = new Folder($path, true, 0755);
              $dir = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          }
          else{
              $dir = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          }

    			$allowed = array('png', 'jpg', 'jpeg');
    			if ( !in_array( substr( strrchr( $filename , '.') , 1 ) , $allowed) ) {
    				throw new InternalErrorException("Error Processing Request.", 1);
    			}elseif( is_uploaded_file( $file_tmp_name ) ){
            $filename = Text::uuid().'-'.$filename;
            $filedb = TableRegistry::get('Arquivos');
            $entity = $filedb->newEntity();
            $entity->filename = $filename;
            $filedb->save($entity);

    				move_uploaded_file($file_tmp_name, $dir.DS.$filename);
    			}
    		}
    	}
    }


    /* -------------------------- PARA EL USUARIO ----------------------------------*/
    public function sendUser( $data )
    {
      debug($data);
      $data = ([$data]);
      debug($data);
    	if ( !empty( $data ) ) {
    		if ( count( $data ) > $this->max_files ) {
    			throw new InternalErrorException("Error Processing Request. Max number files accepted is {$this->max_files}", 1);
    		}

    		foreach ($data as $file) {
    			$filename = $file['name'];
    			$file_tmp_name = $file['tmp_name'];
          // Create a new folder with 0755 permissions
          //$dir = new Folder('/path/to/folder', true, 0755);
          $path = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          $folder = new Folder($path);
          if (is_null($folder->path)) {
              debug("no existe el directorio, pero lo creo ahora :) ");
              $dir = new Folder($path, true, 0755);
              $dir = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          }
          else{
              $dir = WWW_ROOT.'img'.DS.'uploads'.DS.$this->request->session()->read('Auth.User.username');
          }

    			$allowed = array('png', 'jpg', 'jpeg');
    			if ( !in_array( substr( strrchr( $filename , '.') , 1 ) , $allowed) ) {
    				throw new InternalErrorException("Error Processing Request.", 1);
    			}elseif( is_uploaded_file( $file_tmp_name ) ){
            $filename = Text::uuid().'-'.$filename;
            $filedb = TableRegistry::get('Arquivos');
            $entity = $filedb->newEntity();
            $entity->filename = $filename;
            $filedb->save($entity);

    				move_uploaded_file($file_tmp_name, $dir.DS.$filename);
    			}
    		}
    	}
    }


    public function import() {
        // to avoid having to tweak the contents of
        // $data you should use your db field name as the heading name
        // eg: Post.id, Post.title, Post.description


        // set the filename to read CSV from
        //$filename = TMP . 'uploads' . DS . 'Sc_widths' . DS . 'scwidths.csv';
        $filename =  WWW_ROOT.'img'.DS.'uploads' . DS . 'csv' . DS . 'prueba3.csv';
        // open the file
        $handle = fopen($filename, "r");

        // read the 1st row as headings
        $header = fgetcsv($handle);

        // create a message container
        $return = array(
                'messages' => array(),
                'errors' => array(),
        );

        debug($header);

         // read each data row in the file
        $i = 0;
         while (($row = fgetcsv($handle_)) !== FALSE) {
                 $i++;
                 $data = array();


                 // for each header field
                 foreach ($header as $k=>$head) {

                         // get the data field from Model.field
                         if (strpos($head,'.')!==false) {

                                 $h = explode('.',$head);
             #die(debug($h));
                                 $data[$h[0]][$h[1]]=isset($row[$k]) ? $row[$k] : '';

                        }

                         // get the data field from field
                        else {
                                 $data['ScWidth'][$head]=isset($row[$k]) ? $row[$k]: '';
                        }

                 }



        $data['ScWidth']['section_id']=1;
        $this->ScWidth->create();





                 // success or not :/
                if ($this->ScWidth->save($data)) {
        echo "success";

                }
         }


         // close the file
         fclose($handle);


         // return the messages
         //return $return;


    }
}
