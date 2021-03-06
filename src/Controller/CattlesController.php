<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Cattles Controller
 *
 * @property \App\Model\Table\CattlesTable $Cattles
 */
class CattlesController extends AppController {
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$this->paginate = [ 
				'contain' => [ 
						'Users',
						'Events',
						'Photos',
						'Weights' 
				],
				'limit' => 1000,
				'conditions' => [ 
						'Cattles.status' => 0 
				] 
		];
		$cattles = $this->paginate ( $this->Cattles );
		
		$this->set ( compact ( 'cattles' ) );
		$this->set ( '_serialize', [ 
				'cattles' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Cattle id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$cattle = $this->Cattles->get ( $id, [ 
				'contain' => [ 
						'Users',
						'Events',
						'Photos',
						'Weights' 
				] 
		] );
		// Remove deleted events
		if (count ( $this->Cattles->Events ) > 0) {
			$i = 0;
			$del;
			$delIdx = 0;
			foreach ( $this->Cattles->Events as $event ) {
				if ($event->status != 0) {
					$del [$delIdx] = $i;
					$delIdx ++;
				}
				$i ++;
			}
			if (!empty ( $del ) && count ( $del ) > 0) {
				foreach ( $del as $idx ) {
					unset ( $this->Cattles->Events [$idx] );
				}
			}
		}
		$this->set ( 'cattle', $cattle );
		$this->set ( '_serialize', [ 
				'cattle' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$this->loadModel ( 'Weights' );
		$weight = $this->Weights->newEntity ();
		
		$cattle = $this->Cattles->newEntity ();
		if ($this->request->is ( 'post' )) {
			$cattle = $this->Cattles->patchEntity ( $cattle, $this->request->data );
			if ($this->Cattles->save ( $cattle )) {
				$this->Flash->success ( __ ( 'The cattle has been saved.' ) );
				// Add new weight when buy new cow
				$weight ['cattle_id'] = $cattle ['id'];
				$weight ['user_id'] = $cattle ['user_id'];
				$weight ['name'] = 'Cân khi nhập về';
				$weight ['weight'] = $cattle ['weight'];
				$this->Weights->save ( $weight );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The cattle could not be saved. Please, try again.' ) );
			}
		}
		$users = $this->Cattles->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'cattle', 'users' ) );
		$this->set ( '_serialize', [ 
				'cattle' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Cattle id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$cattle = $this->Cattles->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$cattle = $this->Cattles->patchEntity ( $cattle, $this->request->data );
			if ($this->Cattles->save ( $cattle )) {
				$this->Flash->success ( __ ( 'The cattle has been saved.' ) );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The cattle could not be saved. Please, try again.' ) );
			}
		}
		$users = $this->Cattles->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'cattle', 'users' ) );
		$this->set ( '_serialize', [ 
				'cattle' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Cattle id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Weights' );
		$this->loadModel ( 'Photos' );
		//delete all event
		$query = $this->Events->query();
		$query->update()
		->set(['status' => -1])
		->where(['cattle_id' => $id])
		->execute();
		//delete all weight
		$query1 = $this->Weights->query();
		$query1->update()
		->set(['status' => -1])
		->where(['cattle_id' => $id])
		->execute();
		//delete all photos
		$query2 = $this->Photos->query();
		$query2->update()
		->set(['status' => -1])
		->where(['cattle_id' => $id])
		->execute();
		
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$cattle = $this->Cattles->get ( $id );
		$cattle['status'] =-1;
		
		if ($this->Cattles->save ( $cattle )) {
			$this->Flash->success ( __ ( 'The cattle has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The cattle could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function chart($id = null) {
		$this->viewBuilder ()->layout ( false );
		$cattle = $this->Cattles->get ( $id, [ 
				'contain' => [ 
						'Users',
						'Events',
						'Photos',
						'Weights' 
				] 
		] );
		// chart1
		$s1;
		$tick1;
		$i = 0;
		// chart2
		$s2;
		$tmp = $cattle->weights [0]->weight;
		if (! empty ( $cattle->weights )) {
			foreach ( $cattle->weights as $weights ) {
				// chart1
				$s1 [$i] = $weights->weight;
				$tick1 [$i] = date ( 'd.m.Y', strtotime ( $weights->date ) );
				// chart2
				$s2 [$i] = $weights->weight - $tmp;
				$tmp = $weights->weight;
				$i ++;
			}
		}
		$this->set ( 's1', $s1 );
		$this->set ( '_serialize', [ 
				's1' 
		] );
		
		$this->set ( 's2', $s2 );
		$this->set ( '_serialize', [ 
				's2' 
		] );
		
		$this->set ( 'tick1', $tick1 );
		$this->set ( '_serialize', [ 
				'tick1' 
		] );
		
		$this->set ( 'cattle', $cattle );
		$this->set ( '_serialize', [ 
				'cattle' 
		] );
	}
	public function graph() {
		$this->viewBuilder ()->layout ( false );
		
		$this->paginate = [ 
				'contain' => [ 
						'Users',
						'Events',
						'Photos',
						'Weights' 
				],
				'limit' => 1000,
				'conditions' => [
						'Cattles.status' => 0
				]
		];
		$cattles = $this->paginate ( $this->Cattles );
		
		$this->set ( compact ( 'cattles' ) );
		$this->set ( '_serialize', [ 
				'cattles' 
		] );
		
		// chart1
		$s1;
		$tick1;
		$i = 0;
		// chart2
		$s2;
		if (! empty ( $cattles )) {
			foreach ( $cattles as $cattle ) {
				// chart1
				$s1 [$i] = $cattle ['weight'];
				$tick1 [$i] = $cattle ['id'] . '-' . $cattle ['name'];
				if (! empty ( $cattle->weights )) {
					$count = count ( $cattle->weights );
					if ($count > 1) {
						$s2 [$i] = $cattle->weights [$count - 1]->weight - $cattle->weights [$count - 2]->weight;
					} else {
						$s2 [$i] = 0;
					}
				} else {
					$s2 [$i] = 0;
				}
				$i ++;
			}
		}
		$this->set ( 's1', $s1 );
		$this->set ( '_serialize', [ 
				's1' 
		] );
		
		$this->set ( 's2', $s2 );
		$this->set ( '_serialize', [ 
				's2' 
		] );
		
		$this->set ( 'tick1', $tick1 );
		$this->set ( '_serialize', [ 
				'tick1' 
		] );
	}
}
