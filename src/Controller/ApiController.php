<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Cattles Controller
 *
 * @property \App\Model\Table\CattlesTable $Cattles
 */
class ApiController extends AppController {
	public $uses = array (
			'Users' 
	);
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		// $this->loadModel('Users');
		// $var = ClassRegistry::init('User')->myMethod($array);
		$conditions = array ();
		
		$this->loadModel ( 'Users' );
		$users = $this->Users->find ( 'all', [ 
				'limit' => 5,
				'order' => 'Users.id DESC' 
		] );
		// $items = ClassRegistry::init('User')->getList();
		$this->set ( compact ( 'users' ) );
		
		// $users = $this->paginate($this->Users);
		
		// $this->set(compact('users'));
		// $this->set('_serialize', ['users']);
		
		$this->autoRender = false;
		$this->response->type ( 'json' );
		
		$json = json_encode ( $users );
		$this->response->body ( $json );
	}
	public function signin() {
		if ($this->request->is ( 'post' )) {
			$this->loadModel ( 'Users' );
			$user = $this->Users->find ( 'all', array (
					// 'fields' => $arrayOfFields,
					'conditions' => array (
							'Users.name' => $this->request->data ["name"],
							'Users.password' => $this->request->data ["password"] 
					) 
			)
			// 'group' => array('Buyer.campaign','Buyer.lead_status'),
			// 'order' => 'Buyer.campaign'
			 )->first ();
			if ($user) {
				$hash = sha1 ( $this->data ['User'] ['username'] . rand ( 0, 100 ) );
				$user ["access_token"] = $hash;
				$user = $this->Users->save ( $user );
			}
			$this->autoRender = false;
			$this->response->type ( 'json' );
			$json = json_encode ( $user );
			$this->response->body ( $json );
		}
	}
	public function signup() {
		if ($this->request->is ( 'post' )) {
			$this->loadModel ( 'Users' );
			$user = $this->Users->newEntity ();
			$user = $this->Users->patchEntity ( $user, $this->request->data );
			$hash = sha1 ( $this->data ['User'] ['username'] . rand ( 0, 100 ) );
			$user ["access_token"] = $hash;
			if ($this->Users->save ( $user )) {
				// $this->Flash->success(__('The user has been saved.'));
				// return $this->redirect(['action' => 'index']);
				$user ["description"] = "The user has been saved.";
				$user ["status"] = 0;
			} else {
				// $this->Flash->error(__('The user could not be saved. Please, try again.'));
				$user ["description"] = "The user could not be saved. Please, try again.";
				$user ["status"] = - 1;
			}
			
			$this->autoRender = false;
			$this->response->type ( 'json' );
			
			$json = json_encode ( $user );
			$this->response->body ( $json );
		}
	}
	public function signout() {
		$this->loadModel ( 'Users' );
		$this->loadModel ( 'Messages' );
		$user =  $this->isAuth ();
		if ($this->request->is ( 'post' )) {
			if (!$user) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			$user['access_token'] = NULL;
			if ($this->Users->save ( $user )) {
				$cattle = $this->Messages->newEntity ();
				$cattle ['message'] = $user['name'].' has been logged out';
				$cattle ['status'] = 1;
				$this->Messages->save ( $cattle );
				$this->responseResult ( $cattle );
			} else {
				$cattle = $this->Messages->newEntity ();
				$cattle ['message'] = "The signout failed";
				$cattle ['status'] = - 1;
				$this->Messages->save ( $cattle );
				$this->responseResult ( $cattle );
			}
			}
		}
	}
	//-------CATTLE----------------------
	public function addCattle() {
		$this->loadModel ( 'Cattles' );
		$this->loadModel ( 'Messages' );
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			if ($this->request->is ( 'post' )) {
				$cattle = $this->Cattles->newEntity ();
				$cattle = $this->Cattles->patchEntity ( $cattle, $this->request->data );
				//All caplock
				$cattle['name'] = strtoupper($cattle['name']);
				if ($this->Cattles->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The cattle can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
				
				$this->responseResult ( $cattle );
			}
		}
	}
	public function viewCattle($id =null) {
		$this->loadModel ( 'Cattles' );
		$this->loadModel ( 'Messages' );

		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			$cattle = $this->Cattles->get($id, [
					'contain' => [ 'Events', 'Photos', 'Weights']
			]);
			$this->responseResult ( $cattle );
		}
		
	}
	public function updateCattle($id = null) {
		$this->loadModel ( 'Cattles' );
		$this->loadModel ( 'Messages' );
		
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {

			$cattle = $this->Cattles->get ($id);
			
			if ($this->request->is ( [ 
					'patch',
					'post',
					'put' 
			] )) {
				//$cattle = $this->Cattles->newEntity ();
				$cattle = $this->Cattles->patchEntity ( $cattle, $this->request->data );
				if ($this->Cattles->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The cattle can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
				
				$this->responseResult ( $cattle );
			}
		}
	}
	public function deleteCattle($id = null) {
		$this->loadModel ( 'Cattles' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $id );
		} else {
	
			$cattle = $this->Cattles->get ($id);
				
			if ($this->request->is ( [
					'post',
					'delete'
			] )) {
				
				if ($this->Cattles->delete ( $cattle )) {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The cattle has been deleted";
					$cattle ['status'] = 0;
					$this->Messages->save ( $cattle );
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The cattle can not delete";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function cattles() {
		$this->loadModel ( 'Cattles' );
		$this->loadModel ( 'Messages' );
		/*
		$limit = $this->params['url']['limit'];
		$offset = $this->params['url']['offset'];
		$results = $this->Cattles->find('all',
				array('limit'=>10,
						'order'=>array('date DESC')));
						*/
		$user = $this->isAuth ();
		if (!$user) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			
			$cattles = $this->Cattles->find('all', [
					'conditions' => ['user_id'=>$user['id'], 'status'=>0 ],
					'contain' => ['Events', 'Photos', 'Weights']
			]);
			
			//$cattles = $this->Cattles->find('all', array('conditions'=>array('user_id'=>$user['id'])));
			$this->responseResult ( $cattles );
		}
	}
	//------------COST-------------------------------
	public function addCost() {
		$this->loadModel ( 'Costs' );
		$this->loadModel ( 'Messages' );
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			if ($this->request->is ( 'post' )) {
				$cattle = $this->Costs->newEntity ();
				$cattle = $this->Costs->patchEntity ( $cattle, $this->request->data );
	
				if ($this->Costs->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Cost can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function updateCost($id = null) {
		$this->loadModel ( 'Costs' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
	
			$cattle = $this->Costs->get ($id);
				
			if ($this->request->is ( [
					'patch',
					'post',
					'put'
			] )) {
				//$cattle = $this->Cattles->newEntity ();
				$cattle = $this->Costs->patchEntity ( $cattle, $this->request->data );
				if ($this->Costs->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The cattle can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function deleteCost($id = null) {
		$this->loadModel ( 'Costs' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $id );
		} else {
	
			$cattle = $this->Costs->get ($id);
	
			if ($this->request->is ( [
					'post',
					'delete'
			] )) {
	
				if ($this->Costs->delete ( $cattle )) {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Cost has been deleted";
					$cattle ['status'] = 0;
					$this->Messages->save ( $cattle );
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Cost can not delete";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function costs() {
		$this->loadModel ( 'Costs' );
		$this->loadModel ( 'Messages' );
		/*
			$limit = $this->params['url']['limit'];
			$offset = $this->params['url']['offset'];
			$results = $this->Cattles->find('all',
			array('limit'=>10,
			'order'=>array('date DESC')));
			*/
		$user = $this->isAuth ();
		if (!$user) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
				
			$cattles = $this->Costs->find('all', [
					'conditions'=>['status'=>0],
					'order' => 'date DESC'
					
			]);
				
			//$cattles = $this->Cattles->find('all', array('conditions'=>array('user_id'=>$user['id'])));
			$this->responseResult ( $cattles );
		}
	}
	//-----------EVENTS--------------------------------------------------------
	public function addEvent() {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Messages' );
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			if ($this->request->is ( 'post' )) {
				$cattle = $this->Events->newEntity ();
				$cattle = $this->Events->patchEntity ( $cattle, $this->request->data );
	
				if ($this->Events->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The event can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function addEvents() {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Messages' );
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			if ($this->request->is ( 'post' )) {

				$cattleIds = explode(",",$this->request->data['cattle_ids']);
				//$this->responseResult ( $cattleIds );
				//return;
				foreach($cattleIds as $id) {
					if($id && strlen($id) >0){
						$cattle = $this->Events->newEntity ();
						$cattle = $this->Events->patchEntity ( $cattle, $this->request->data );
					$cat = $this->findCattleByName(strtoupper (trim($id)));
					$cattle['cattle_id'] = $cat['id'];
					//$this->responseResult ( $cattle );
					//return;
						if($this->Events->save ( $cattle )){
						
						}else{
							$cattle = $this->Messages->newEntity ();
							$cattle ['message'] = "The event can not saved";
							$cattle ['status'] = - 1;
							$this->Messages->save ( $cattle );
							break;
						}
					}else{
						$cattle = $this->Messages->newEntity ();
						$cattle ['message'] = "The event can not saved";
						$cattle ['status'] = - 1;
						$this->Messages->save ( $cattle );
						break;
					}
				}

	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function updateEvent($id = null) {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
	
			$cattle = $this->Events->get ($id);
	
			if ($this->request->is ( [
					'patch',
					'post',
					'put'
			] )) {
				//$cattle = $this->Cattles->newEntity ();
				$cattle = $this->Events->patchEntity ( $cattle, $this->request->data );
				if ($this->Events->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The event can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function deleteEvent($id = null) {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $id );
		} else {
	
			$cattle = $this->Events->get ($id);
	
			if ($this->request->is ( [
					'post',
					'delete'
			] )) {
	
				if ($this->Events->delete ( $cattle )) {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The event has been deleted";
					$cattle ['status'] = 0;
					$this->Messages->save ( $cattle );
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The event can not delete";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function events() {
		$this->loadModel ( 'Events' );
		$this->loadModel ( 'Messages' );
		/*
		 $limit = $this->params['url']['limit'];
		 $offset = $this->params['url']['offset'];
		 $results = $this->Cattles->find('all',
		 array('limit'=>10,
		 'order'=>array('date DESC')));
		 */
		$user = $this->isAuth ();
		if (!$user) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
	
			$cattles = $this->Events->find('all', [
					'conditions'=>['status'=>0],
					'order' => 'date DESC'
			
			]);
			$this->responseResult ( $cattles );
		}
	}
	//-------------------------WEIGHT-----------------------------------------
	public function addWeight() {
		$this->loadModel ( 'Weights' );
		$this->loadModel ( 'Messages' );
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
			if ($this->request->is ( 'post' )) {
				$cattle = $this->Weights->newEntity ();
				$cattle = $this->Weights->patchEntity ( $cattle, $this->request->data );
	
				if ($this->Weights->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Weight can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function updateWeight($id = null) {
		$this->loadModel ( 'Weights' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
	
			$cattle = $this->Weights->get ($id);
	
			if ($this->request->is ( [
					'patch',
					'post',
					'put'
			] )) {
				//$cattle = $this->Cattles->newEntity ();
				$cattle = $this->Weights->patchEntity ( $cattle, $this->request->data );
				if ($this->Weights->save ( $cattle )) {
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Weight can not saved";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function deleteWeight($id = null) {
		$this->loadModel ( 'Weights' );
		$this->loadModel ( 'Messages' );
	
		if (! $this->isAuth ()) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $id );
		} else {
	
			$cattle = $this->Weights->get ($id);
	
			if ($this->request->is ( [
					'post',
					'delete'
			] )) {
	
				if ($this->Weights->delete ( $cattle )) {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Weight has been deleted";
					$cattle ['status'] = 0;
					$this->Messages->save ( $cattle );
				} else {
					$cattle = $this->Messages->newEntity ();
					$cattle ['message'] = "The Weight can not delete";
					$cattle ['status'] = - 1;
					$this->Messages->save ( $cattle );
				}
	
				$this->responseResult ( $cattle );
			}
		}
	}
	public function weights() {
		$this->loadModel ( 'Weights' );
		$this->loadModel ( 'Messages' );
		/*
		 $limit = $this->params['url']['limit'];
		 $offset = $this->params['url']['offset'];
		 $results = $this->Cattles->find('all',
		 array('limit'=>10,
		 'order'=>array('date DESC')));
		 */
		$user = $this->isAuth ();
		if (!$user) {
			$cattle = $this->Messages->newEntity ();
			$cattle ['message'] = "User is not permission";
			$cattle ['status'] = - 1;
			$this->Messages->save ( $cattle );
			$this->responseResult ( $cattle );
		} else {
	
			$cattles = $this->Weights->find('all', [
					'conditions'=>['status'=>0],
					'order' => 'date DESC'
		
			]);
			$this->responseResult ( $cattles );
		}
	}
	//--------
	function responseResult($object = NULL) {
		$this->autoRender = false;
		$this->response->type ( 'json' );
		$json = json_encode ( $object );
		$this->response->body ( $json );
	}
	function isAuth() {
		$this->loadModel ( 'Users' );
		$token = $this->request->header ( 'X-AUTH' );
		$user = $this->Users->find ( 'all', array (
				// 'fields' => $arrayOfFields,
				'conditions' => array (
						'access_token' => $token 
				) 
		)
		// 'group' => array('Buyer.campaign','Buyer.lead_status'),
		// 'order' => 'Buyer.campaign'
		 )->first ();
		return $user;
	}
	function findCattleByName($name =NULL) {
		$this->loadModel ( 'Cattles' );
		$user = $this->Cattles->find ( 'all', array (
				// 'fields' => $arrayOfFields,
				'conditions' => array (
						'name' => $name
				)
		)
				// 'group' => array('Buyer.campaign','Buyer.lead_status'),
				// 'order' => 'Buyer.campaign'
			 )->first ();
			 return $user;
	}
}