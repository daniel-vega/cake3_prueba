<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Revista Controller
 *
 * @property \App\Model\Table\RevistaTable $Revista
 */
class RevistaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $revista = $this->paginate($this->Revista);

        $this->set(compact('revista'));
        $this->set('_serialize', ['revista']);
    }

    /**
     * View method
     *
     * @param string|null $id Revistum id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $revistum = $this->Revista->get($id, [
            'contain' => []
        ]);

        $this->set('revistum', $revistum);
        $this->set('_serialize', ['revistum']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user     = $this->Auth->user();

        debug($user['username']);


        $revistum = $this->Revista->newEntity();
        $this->Article = TableRegistry::get('Articles');
        $this->Category = TableRegistry::get('Categories');
        $this->loadModel("Articles");
        $this->loadModel("Categories");

          if ($this->request->is('post')) {
            $articlum = $this->Article->newEntity();
            $categorias = $this->Category->newEntity();
            $form1 = array(
                "id_category" => $this->request->data['id_category'],
                "id_article" => $this->request->data['id_article']
            );

            $form2 = array(
                "id_article" => $this->request->data['id_article'],
                "title" => $this->request->data['title'],
                "body"  => $this->request->data['body']
            );

            $form3 = array(
                "id_category" => $this->request->data['id_category']
            );

            $revistum = $this->Revista->patchEntity($revistum, $form1);
            //$this->loadModel("Articles");
            // para el articulo
            $articlum = $this->Articles->patchEntity($articlum, $form2);
            //$this->Articles->save($article);
            $categorias = $this->Category->patchEntity($categorias, $form3);

            ////$revistum = $this->Revista->patchEntity($revistum, $form1);
            //$this->loadModel("Articles");
            // para el articulo
            ////$articlum = $this->Articles->patchEntity($articlum, $form2);
            //$this->Articles->save($article);
            ////$categorias = $this->Category->patchEntity($categorias, $form3);

            if ($this->Revista->save($revistum) && $this->Article->save($articlum) && $this->Category->save($categorias)) {
                $this->Flash->success(__('The revistum has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revistum could not be saved. Please, try again.'));
            }
        }

        $articles = $this->Article->find('list')->all()->toArray();
        $category = $this->Category->find('list')->all()->toArray();
        $this->set(compact('revistum','articles','category'));
        $this->set('_serialize', ['revistum']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Revistum id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $revistum = $this->Revista->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $revistum = $this->Revista->patchEntity($revistum, $this->request->data);
            if ($this->Revista->save($revistum)) {
                $this->Flash->success(__('The revistum has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revistum could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('revistum'));
        $this->set('_serialize', ['revistum']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Revistum id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $revistum = $this->Revista->get($id);
        if ($this->Revista->delete($revistum)) {
            $this->Flash->success(__('The revistum has been deleted.'));
        } else {
            $this->Flash->error(__('The revistum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
