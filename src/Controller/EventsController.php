<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController {
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$this->paginate = [ 
				'contain' => [ 
						'Cattles',
						'Users' 
				],
				'limit' => 10000,
				'conditions' => [ 
						'Events.status' => 0 
				] 
		];
		$events = $this->paginate ( $this->Events );
		
		$this->set ( compact ( 'events' ) );
		$this->set ( '_serialize', [ 
				'events' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Event id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$event = $this->Events->get ( $id, [ 
				'contain' => [ 
						'Cattles',
						'Users' 
				] 
		] );
		
		$this->set ( 'event', $event );
		$this->set ( '_serialize', [ 
				'event' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$event = $this->Events->newEntity ();
		if ($this->request->is ( 'post' )) {
			
			$ok = true;
			if (! empty ( $this->request->data ['cattle_id'] )) {
				foreach ( $this->request->data ['cattle_id'] as $cattle_id ) {
					$event = $this->Events->newEntity ();
					$event = $this->Events->patchEntity ( $event, $this->request->data );
					$event ['cattle_id'] = $cattle_id;
					if (! $this->Events->save ( $event )) {
						$ok = false;
					}
				}
			}
			
			if ($ok) {
				$this->Flash->success ( __ ( 'The event has been saved.' ) );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The event could not be saved. Please, try again.' ) );
			}
		}
		
		$cattles = $this->Events->Cattles->find ( 'all' );
		$cats;
		foreach ( $cattles as $cattle ) {
			$cats [$cattle ['id']] = $cattle ['id'] . '-' . $cattle ['name'];
		}
		$users = $this->Events->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'event', 'cattles', 'users', 'cats' ) );
		$this->set ( '_serialize', [ 
				'event' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Event id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$event = $this->Events->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$event = $this->Events->patchEntity ( $event, $this->request->data );
			if ($this->Events->save ( $event )) {
				$this->Flash->success ( __ ( 'The event has been saved.' ) );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The event could not be saved. Please, try again.' ) );
			}
		}
		$cattles = $this->Events->Cattles->find ( 'list', [ 
				'limit' => 200 
		] );
		$users = $this->Events->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'event', 'cattles', 'users' ) );
		$this->set ( '_serialize', [ 
				'event' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Event id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$event = $this->Events->get ( $id );
		$event['status'] =-1;
		if ($this->Events->save ( $event )) {
			$this->Flash->success ( __ ( 'The event has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The event could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
}
