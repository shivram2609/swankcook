<?php
App::uses('AppController', 'Controller');
/**
 * TrackOrders Controller
 *
 * @property TrackOrder $TrackOrder
 * @property PaginatorComponent $Paginator
 */
class TrackOrdersController extends AppController {

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
		$this->TrackOrder->recursive = 0;
		$this->set('trackOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TrackOrder->exists($id)) {
			throw new NotFoundException(__('Invalid track order'));
		}
		$options = array('conditions' => array('TrackOrder.' . $this->TrackOrder->primaryKey => $id));
		$this->set('trackOrder', $this->TrackOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TrackOrder->create();
			if ($this->TrackOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The track order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track order could not be saved. Please, try again.'));
			}
		}
		$users = $this->TrackOrder->User->find('list');
		$orders = $this->TrackOrder->Order->find('list');
		$orderStatuses = $this->TrackOrder->OrderStatus->find('list');
		$this->set(compact('users', 'orders', 'orderStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TrackOrder->exists($id)) {
			throw new NotFoundException(__('Invalid track order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TrackOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The track order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TrackOrder.' . $this->TrackOrder->primaryKey => $id));
			$this->request->data = $this->TrackOrder->find('first', $options);
		}
		$users = $this->TrackOrder->User->find('list');
		$orders = $this->TrackOrder->Order->find('list');
		$orderStatuses = $this->TrackOrder->OrderStatus->find('list');
		$this->set(compact('users', 'orders', 'orderStatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TrackOrder->id = $id;
		if (!$this->TrackOrder->exists()) {
			throw new NotFoundException(__('Invalid track order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TrackOrder->delete()) {
			$this->Session->setFlash(__('The track order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The track order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
