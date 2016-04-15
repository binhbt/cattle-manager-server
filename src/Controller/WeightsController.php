<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weights Controller
 *
 * @property \App\Model\Table\WeightsTable $Weights
 */
class WeightsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cattles', 'Users']
        ];
        $weights = $this->paginate($this->Weights);

        $this->set(compact('weights'));
        $this->set('_serialize', ['weights']);
    }

    /**
     * View method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weight = $this->Weights->get($id, [
            'contain' => ['Cattles', 'Users']
        ]);

        $this->set('weight', $weight);
        $this->set('_serialize', ['weight']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weight = $this->Weights->newEntity();
        if ($this->request->is('post')) {
            $weight = $this->Weights->patchEntity($weight, $this->request->data);
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The weight could not be saved. Please, try again.'));
            }
        }
        $cattles = $this->Weights->Cattles->find('list', ['limit' => 200]);
        $users = $this->Weights->Users->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'cattles', 'users'));
        $this->set('_serialize', ['weight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weight = $this->Weights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weight = $this->Weights->patchEntity($weight, $this->request->data);
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The weight could not be saved. Please, try again.'));
            }
        }
        $cattles = $this->Weights->Cattles->find('list', ['limit' => 200]);
        $users = $this->Weights->Users->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'cattles', 'users'));
        $this->set('_serialize', ['weight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weight = $this->Weights->get($id);
        if ($this->Weights->delete($weight)) {
            $this->Flash->success(__('The weight has been deleted.'));
        } else {
            $this->Flash->error(__('The weight could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
