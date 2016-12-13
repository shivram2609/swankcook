<?php
App::uses('AppController', 'Controller');
/**
 * Cuisines Controller
 *
 * @property Cuisine $Cuisine
 * @property PaginatorComponent $Paginator
 */
class CuisinesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index($searchval = NULL) {
		$this->Cuisine->recursive = 0;
		$this->bulkactions();
		if ( !empty($searchval) ) {
			$this->set("searchval",$searchval);
			$this->conditions = array("Cuisine.type like"=> "%".$searchval."%");
		}
		if ( $this->request->is("post") ) {
			if ( !empty($this->data['Cuisine']['searchval']) ) {
				$this->redirect(SITE_LINK."admin/cuisines/".$this->data['Cuisine']['searchval']);
			} else {
				$this->redirect(SITE_LINK."admin/cuisines/");
			}
		}
		$this->set('cuisines', $this->Paginator->paginate($this->conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cuisine->exists($id)) {
			throw new NotFoundException(__('Invalid cuisine'));
		}
		$options = array('conditions' => array('Cuisine.' . $this->Cuisine->primaryKey => $id));
		$this->set('cuisine', $this->Cuisine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cuisine->create();
			if ($this->Cuisine->save($this->request->data)) {
				$this->Session->setFlash(__('The cuisine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuisine could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Cuisine->exists($id)) {
			throw new NotFoundException(__('Invalid cuisine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cuisine->save($this->request->data)) {
				$this->Session->setFlash(__('The cuisine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuisine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cuisine.' . $this->Cuisine->primaryKey => $id));
			$this->request->data = $this->Cuisine->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cuisine->id = $id;
		if (!$this->Cuisine->exists()) {
			throw new NotFoundException(__('Invalid cuisine'));
		}
		if (($this->Session->read("Auth.User.id")) && $this->Session->read("Auth.User.usertype_id") != 1 ) {
		} else {
			throw new NotFoundException(__('Invalid action'));
		}
		if ($this->Cuisine->delete()) {
			$this->Session->setFlash(__('The cuisine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cuisine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
