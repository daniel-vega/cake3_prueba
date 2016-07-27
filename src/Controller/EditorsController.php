<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Editors Controller
 *
 * @property \App\Model\Table\EditorsTable $Editors
 */
class EditorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $editors = $this->paginate($this->Editors);

        $this->set(compact('editors'));
        $this->set('_serialize', ['editors']);
    }

    /**
     * View method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $editor = $this->Editors->get($id, [
            'contain' => ['Articles']
        ]);

        $this->set('editor', $editor);
        $this->set('_serialize', ['editor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $editor = $this->Editors->newEntity();
        if ($this->request->is('post')) {
            $editor = $this->Editors->patchEntity($editor, $this->request->data);
            if ($this->Editors->save($editor)) {
                $this->Flash->success(__('The editor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The editor could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Editors->Articles->find('list', ['limit' => 200]);
        $this->set(compact('editor', 'articles'));
        $this->set('_serialize', ['editor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $editor = $this->Editors->get($id, [
            'contain' => ['Articles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $editor = $this->Editors->patchEntity($editor, $this->request->data);
            if ($this->Editors->save($editor)) {
                $this->Flash->success(__('The editor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The editor could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Editors->Articles->find('list', ['limit' => 200]);
        $this->set(compact('editor', 'articles'));
        $this->set('_serialize', ['editor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $editor = $this->Editors->get($id);
        if ($this->Editors->delete($editor)) {
            $this->Flash->success(__('The editor has been deleted.'));
        } else {
            $this->Flash->error(__('The editor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
