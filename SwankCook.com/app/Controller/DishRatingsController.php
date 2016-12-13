<?php
App::uses('AppController', 'Controller');
/**
 * DishRatings Controller
 *
 * @property DishRating $DishRating
 * @property PaginatorComponent $Paginator
 */
class DishRatingsController extends AppController {

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
		$this->DishRating->recursive = 0;
		$this->set('dishRatings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DishRating->exists($id)) {
			throw new NotFoundException(__('Invalid dish rating'));
		}
		$options = array('conditions' => array('DishRating.' . $this->DishRating->primaryKey => $id));
		$this->set('dishRating', $this->DishRating->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DishRating->create();
			if ($this->DishRating->save($this->request->data)) {
				$this->Session->setFlash(__('The dish rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dish rating could not be saved. Please, try again.'));
			}
		}
		$dishes = $this->DishRating->Dish->find('list');
		$users = $this->DishRating->User->find('list');
		$this->set(compact('dishes', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DishRating->exists($id)) {
			throw new NotFoundException(__('Invalid dish rating'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DishRating->save($this->request->data)) {
				$this->Session->setFlash(__('The dish rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dish rating could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DishRating.' . $this->DishRating->primaryKey => $id));
			$this->request->data = $this->DishRating->find('first', $options);
		}
		$dishes = $this->DishRating->Dish->find('list');
		$users = $this->DishRating->User->find('list');
		$this->set(compact('dishes', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DishRating->id = $id;
		if (!$this->DishRating->exists()) {
			throw new NotFoundException(__('Invalid dish rating'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DishRating->delete()) {
			$this->Session->setFlash(__('The dish rating has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dish rating could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
