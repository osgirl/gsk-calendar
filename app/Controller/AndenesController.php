<?php
App::uses('AppController', 'Controller');
/**
 * Andenes Controller
 *
 * @property Andene $Andene
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AndenesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'GoogleCalendar');

	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->Security) &&  ($this->RequestHandler->isAjax() || $this->action=='add')){
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$checkResult = $this->GoogleCalendar->test();

		debug($checkResult);

		$this->Andene->recursive = 0;
		$this->set('andenes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Andene->exists($id)) {
			throw new NotFoundException(__('Invalid andene'));
		}
		$options = array('conditions' => array('Andene.' . $this->Andene->primaryKey => $id));
		$this->set('andene', $this->Andene->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->isPost()) {
			if($this->RequestHandler->isAjax()) {
				$this->layout = 'ajax';     // uses an empty layout
				$this->autoRender = false;  // renders nothing by default
			}

			$this->request->data['User']['creator_id'] = $this->UserAuth->getUserId();

			$this->Andene->set($this->request->data);
			$addValidate = $this->Andene->addValidate();
			if($this->RequestHandler->isAjax()) {
				if ($addValidate) {
					$response = array('error' => 0, 'message' => 'success');
					return json_encode($response);
				} else {
					$response = array('error' => 1,'message' => 'failure');
					$response['data']['Andene']   = $this->Andene->validationErrors;
					return json_encode($response);
				}
			} else {
				if ($addValidate) {
					$this->Andene->save($this->request->data,false);
					$this->Session->setFlash(__('El Anden ha sigo agregado con exito.'), 'flash_gritter', array(), 'success');
					$this->redirect(array('action' => 'index'));
				}
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
		if (!$this->Andene->exists($id)) {
			throw new NotFoundException(__('Invalid andene'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Andene->save($this->request->data)) {
				$this->Session->setFlash(__('The andene has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The andene could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Andene.' . $this->Andene->primaryKey => $id));
			$this->request->data = $this->Andene->find('first', $options);
		}
		$calendarios = $this->Andene->Calendario->find('list');
		$creators = $this->Andene->Creator->find('list');
		$modifiers = $this->Andene->Modifier->find('list');
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
		$this->Andene->id = $id;
		if (!$this->Andene->exists()) {
			throw new NotFoundException(__('Invalid andene'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Andene->delete()) {
			$this->Session->setFlash(__('The andene has been deleted.'));
		} else {
			$this->Session->setFlash(__('The andene could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
