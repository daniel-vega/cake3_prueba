<?php
namespace App\Controller;

use App\Controller\AppController;

class ArquivosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function upload()
    {
        if ( !empty( $this->request->data ) ) {
            debug($this->request->data['uploadfile']);
            $this->Upload->send($this->request->data['uploadfile']);
        }
    }

    public function read()
    {
      //debug($this->request->data['uploadfile']);
        if ( empty( $this->request->data ) ) {
            debug($this->request->data['uploadfile']);
            $this->Upload->import($this->request->data['uploadfile']);
        }
    }
}
