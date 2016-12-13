<?php
App::uses('AppController', 'Controller');
/**
 * Cmspages Controller
 *
 * @property Cmspage $Cmspage
 * @property PaginatorComponent $Paginator
 */
class CmspagesController extends AppController {

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
	public function index() {
		$this->Cmspage->recursive = 0;
		$this->set('cmspages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cmspage->exists($id)) {
			throw new NotFoundException(__('Invalid cmspage'));
		}
		$options = array('conditions' => array('Cmspage.' . $this->Cmspage->primaryKey => $id));
		$this->set('cmspage', $this->Cmspage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cmspage->create();
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('The cmspage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cmspage could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->Cmspage->exists($id)) {
			throw new NotFoundException(__('Invalid cmspage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('The cmspage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cmspage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cmspage.' . $this->Cmspage->primaryKey => $id));
			$this->request->data = $this->Cmspage->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cmspage->id = $id;
		if (!$this->Cmspage->exists()) {
			throw new NotFoundException(__('Invalid cmspage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cmspage->delete()) {
			$this->Session->setFlash(__('The cmspage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cmspage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
