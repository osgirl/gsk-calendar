<?php
App::uses('AppController', 'Controller');
/**
 * Pallets Controller
 *
 * @property Pallet $Pallet
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PalletsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pallet->recursive = 0;
		$this->set('pallets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pallet->exists($id)) {
			throw new NotFoundException(__('Invalid pallet'));
		}
		$options = array('conditions' => array('Pallet.' . $this->Pallet->primaryKey => $id));
		$this->set('pallet', $this->Pallet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pallet->create();
			if ($this->Pallet->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet could not be saved. Please, try again.'));
			}
		}
		$creators = $this->Pallet->Creator->find('list');
		$modifiers = $this->Pallet->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pallet->exists($id)) {
			throw new NotFoundException(__('Invalid pallet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pallet->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pallet.' . $this->Pallet->primaryKey => $id));
			$this->request->data = $this->Pallet->find('first', $options);
		}
		$creators = $this->Pallet->Creator->find('list');
		$modifiers = $this->Pallet->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pallet->id = $id;
		if (!$this->Pallet->exists()) {
			throw new NotFoundException(__('Invalid pallet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pallet->delete()) {
			$this->Session->setFlash(__('The pallet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pallet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
