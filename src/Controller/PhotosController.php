<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 */
class PhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cattles'],
        		'limit' => 10000,
        		'conditions' => [
        				'Photos.status' => 0
        		]
        ];
        $photos = $this->paginate($this->Photos);

        $this->set(compact('photos'));
        $this->set('_serialize', ['photos']);
    }

    /**
     * View method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Cattles']
        ]);

        $this->set('photo', $photo);
        $this->set('_serialize', ['photo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $photo = $this->Photos->newEntity();
        if ($this->request->is('post')) {
            $photo = $this->Photos->patchEntity($photo, $this->request->data);
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The photo could not be saved. Please, try again.'));
            }
        }
        $cattles = $this->Photos->Cattles->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'cattles'));
        $this->set('_serialize', ['photo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->data);
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The photo could not be saved. Please, try again.'));
            }
        }
        $cattles = $this->Photos->Cattles->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'cattles'));
        $this->set('_serialize', ['photo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);
        $photo['status'] = -1;
        if ($this->Photos->save($photo)) {
            $this->Flash->success(__('The photo has been deleted.'));
        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
