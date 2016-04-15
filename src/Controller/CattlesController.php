<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cattles Controller
 *
 * @property \App\Model\Table\CattlesTable $Cattles
 */
class CattlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $cattles = $this->paginate($this->Cattles);

        $this->set(compact('cattles'));
        $this->set('_serialize', ['cattles']);
    }

    /**
     * View method
     *
     * @param string|null $id Cattle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cattle = $this->Cattles->get($id, [
            'contain' => ['Users', 'Events', 'Photos', 'Weights']
        ]);

        $this->set('cattle', $cattle);
        $this->set('_serialize', ['cattle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cattle = $this->Cattles->newEntity();
        if ($this->request->is('post')) {
            $cattle = $this->Cattles->patchEntity($cattle, $this->request->data);
            if ($this->Cattles->save($cattle)) {
                $this->Flash->success(__('The cattle has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cattle could not be saved. Please, try again.'));
            }
        }
        $users = $this->Cattles->Users->find('list', ['limit' => 200]);
        $this->set(compact('cattle', 'users'));
        $this->set('_serialize', ['cattle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cattle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cattle = $this->Cattles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cattle = $this->Cattles->patchEntity($cattle, $this->request->data);
            if ($this->Cattles->save($cattle)) {
                $this->Flash->success(__('The cattle has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cattle could not be saved. Please, try again.'));
            }
        }
        $users = $this->Cattles->Users->find('list', ['limit' => 200]);
        $this->set(compact('cattle', 'users'));
        $this->set('_serialize', ['cattle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cattle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cattle = $this->Cattles->get($id);
        if ($this->Cattles->delete($cattle)) {
            $this->Flash->success(__('The cattle has been deleted.'));
        } else {
            $this->Flash->error(__('The cattle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}