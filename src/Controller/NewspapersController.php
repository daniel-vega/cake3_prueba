<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Newspapers Controller
 *
 * @property \App\Model\Table\NewspapersTable $Newspapers
 */
class NewspapersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $newspapers = $this->paginate($this->Newspapers);

        $this->set(compact('newspapers'));
        $this->set('_serialize', ['newspapers']);

    }


    public function upload()
    {
        if ( !empty( $this->request->data ) ) {
            $this->Upload->send($this->request->data['uploadfile']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Newspaper id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      // cargar un layout diferente
        $newspaper = $this->Newspapers->get($id, [
            'contain' => []
        ]);

        $this->set('newspaper', $newspaper);
        $this->set('_serialize', ['newspaper']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

      debug($this->hola);
        $newspaper = $this->Newspapers->newEntity();
        debug($this->request->data);
        debug(array($this->request->data['uploadfile']));

        if ($this->request->is('posta')) {
            $newspaper = $this->Newspapers->patchEntity($newspaper, $this->request->data);
            if (!empty( $this->request->data)) {
                $this->Upload->send(array($this->request->data['uploadfile']));
            }
            if ($this->Newspapers->save($newspaper)) {
                $this->Flash->success(__('The newspaper has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newspaper could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newspaper'));
        $this->set('_serialize', ['newspaper']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Newspaper id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newspaper = $this->Newspapers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newspaper = $this->Newspapers->patchEntity($newspaper, $this->request->data);
            if ($this->Newspapers->save($newspaper)) {
                $this->Flash->success(__('The newspaper has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newspaper could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newspaper'));
        $this->set('_serialize', ['newspaper']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Newspaper id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newspaper = $this->Newspapers->get($id);
        if ($this->Newspapers->delete($newspaper)) {
            $this->Flash->success(__('The newspaper has been deleted.'));
        } else {
            $this->Flash->error(__('The newspaper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
