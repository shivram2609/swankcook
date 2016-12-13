<?php
App::uses('AppController', 'Controller');
/**
 * CookRatings Controller
 *
 * @property CookRating $CookRating
 * @property PaginatorComponent $Paginator
 */
class CookRatingsController extends AppController {

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
		$this->CookRating->recursive = 0;
		$this->set('cookRatings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CookRating->exists($id)) {
			throw new NotFoundException(__('Invalid cook rating'));
		}
		$options = array('conditions' => array('CookRating.' . $this->CookRating->primaryKey => $id));
		$this->set('cookRating', $this->CookRating->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CookRating->create();
			if ($this->CookRating->save($this->request->data)) {
				$this->Session->setFlash(__('The cook rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cook rating could not be saved. Please, try again.'));
			}
		}
		$cooks = $this->CookRating->Cook->find('list');
		$users = $this->CookRating->User->find('list');
		$this->set(compact('cooks', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CookRating->exists($id)) {
			throw new NotFoundException(__('Invalid cook rating'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CookRating->save($this->request->data)) {
				$this->Session->setFlash(__('The cook rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cook rating could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CookRating.' . $this->CookRating->primaryKey => $id));
			$this->request->data = $this->CookRating->find('first', $options);
		}
		$cooks = $this->CookRating->Cook->find('list');
		$users = $this->CookRating->User->find('list');
		$this->set(compact('cooks', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CookRating->id = $id;
		if (!$this->CookRating->exists()) {
			throw new NotFoundException(__('Invalid cook rating'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CookRating->delete()) {
			$this->Session->setFlash(__('The cook rating has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cook rating could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
