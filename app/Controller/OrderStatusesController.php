<?php
App::uses('AppController', 'Controller');
/**
 * OrderStatuses Controller
 *
 * @property OrderStatus $OrderStatus
 * @property PaginatorComponent $Paginator
 */
class OrderStatusesController extends AppController {

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
		$this->OrderStatus->recursive = 0;
		$this->set('orderStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrderStatus->exists($id)) {
			throw new NotFoundException(__('Invalid order status'));
		}
		$options = array('conditions' => array('OrderStatus.' . $this->OrderStatus->primaryKey => $id));
		$this->set('orderStatus', $this->OrderStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderStatus->create();
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The order status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order status could not be saved. Please, try again.'));
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
		if (!$this->OrderStatus->exists($id)) {
			throw new NotFoundException(__('Invalid order status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The order status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderStatus.' . $this->OrderStatus->primaryKey => $id));
			$this->request->data = $this->OrderStatus->find('first', $options);
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
		$this->OrderStatus->id = $id;
		if (!$this->OrderStatus->exists()) {
			throw new NotFoundException(__('Invalid order status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderStatus->delete()) {
			$this->Session->setFlash(__('The order status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
