<?php
App::uses('AppController', 'Controller');
/**
 * Locations Controller
 *
 * @property Location $Location
 * @property PaginatorComponent $Paginator
 */
class LocationsController extends AppController {

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
		$this->Location->recursive = 0;
		$this->bulkactions();
		if ( !empty($searchval) ) {
			$this->set("searchval",$searchval);
			$this->conditions = array("Location.name like"=> "%".$searchval."%");
		}
		if ( $this->request->is("post") ) {
			if ( !empty($this->data['Location']['searchval']) ) {
				$this->redirect(SITE_LINK."admin/locations/".$this->data['Location']['searchval']);
			} else {
				$this->redirect(SITE_LINK."admin/locations/");
			}
		}
		$this->set('locations', $this->Paginator->paginate($this->conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
		$this->set('location', $this->Location->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Location->create();
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
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
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
			$this->request->data = $this->Location->find('first', $options);
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
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid location'));
		}
		if (($this->Session->read("Auth.User.id")) && $this->Session->read("Auth.User.usertype_id") != 1 ) {
		} else {
			throw new NotFoundException(__('Invalid action'));
		}
		if ($this->Location->delete()) {
			$this->Session->setFlash(__('The location has been deleted.'));
		} else {
			$this->Session->setFlash(__('The location could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
