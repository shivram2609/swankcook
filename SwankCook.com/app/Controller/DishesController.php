<?php
App::uses('AppController', 'Controller');
/**
 * Dishes Controller
 *
 * @property Dish $Dish
 * @property PaginatorComponent $Paginator
 */
class DishesController extends AppController {

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
		$this->Dish->recursive = 0;
		$this->set('dishes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
		$this->set('dish', $this->Dish->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dish->create();
			if ($this->Dish->save($this->request->data)) {
				$this->Session->setFlash(__('The dish has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dish could not be saved. Please, try again.'));
			}
		}
		$users = $this->Dish->User->find('list');
		$cuisines = $this->Dish->Cuisine->find('list');
		$categories = $this->Dish->Category->find('list');
		$this->set(compact('users', 'cuisines', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dish->save($this->request->data)) {
				$this->Session->setFlash(__('The dish has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dish could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
			$this->request->data = $this->Dish->find('first', $options);
		}
		$users = $this->Dish->User->find('list');
		$cuisines = $this->Dish->Cuisine->find('list');
		$categories = $this->Dish->Category->find('list');
		$this->set(compact('users', 'cuisines', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dish->id = $id;
		if (!$this->Dish->exists()) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dish->delete()) {
			$this->Session->setFlash(__('The dish has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dish could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
