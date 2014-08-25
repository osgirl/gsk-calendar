<?php
App::uses('AppController', 'Controller');
/**
 * Bloqueos Controller
 *
 * @property Bloqueo $Bloqueo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BloqueosController extends AppController {

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
		$this->Bloqueo->recursive = 0;
		$this->set('bloqueos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bloqueo->exists($id)) {
			throw new NotFoundException(__('Invalid bloqueo'));
		}
		$options = array('conditions' => array('Bloqueo.' . $this->Bloqueo->primaryKey => $id));
		$this->set('bloqueo', $this->Bloqueo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bloqueo->create();
			if ($this->Bloqueo->save($this->request->data)) {
				$this->Session->setFlash(__('The bloqueo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bloqueo could not be saved. Please, try again.'));
			}
		}
		$calendarios = $this->Bloqueo->Calendario->find('list');
		$creators = $this->Bloqueo->Creator->find('list');
		$modifiers = $this->Bloqueo->Modifier->find('list');
		$this->set(compact('calendarios', 'creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bloqueo->exists($id)) {
			throw new NotFoundException(__('Invalid bloqueo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bloqueo->save($this->request->data)) {
				$this->Session->setFlash(__('The bloqueo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bloqueo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bloqueo.' . $this->Bloqueo->primaryKey => $id));
			$this->request->data = $this->Bloqueo->find('first', $options);
		}
		$calendarios = $this->Bloqueo->Calendario->find('list');
		$creators = $this->Bloqueo->Creator->find('list');
		$modifiers = $this->Bloqueo->Modifier->find('list');
		$this->set(compact('calendarios', 'creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bloqueo->id = $id;
		if (!$this->Bloqueo->exists()) {
			throw new NotFoundException(__('Invalid bloqueo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bloqueo->delete()) {
			$this->Session->setFlash(__('The bloqueo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bloqueo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
