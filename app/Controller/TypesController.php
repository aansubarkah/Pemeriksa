<?php
App::uses('AppController', 'Controller');

/**
 * Types Controller
 *
 * @property Type $Type
 * @property PaginatorComponent $Paginator
 */
class TypesController extends AppController
{

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
    public function index()
    {
        $this->Type->recursive = 0;
        $this->set('types', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Type->exists($id)) {
            throw new NotFoundException(__('Invalid type'));
        }
        $options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
        $this->set('type', $this->Type->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Type->create();
            if ($this->Type->save($this->request->data)) {
                $this->Session->setFlash(__('The type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The type could not be saved. Please, try again.'));
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
    public function edit($id = null)
    {
        if (!$this->Type->exists($id)) {
            throw new NotFoundException(__('Invalid type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Type->save($this->request->data)) {
                $this->Session->setFlash(__('The type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The type could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
            $this->request->data = $this->Type->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Type->delete()) {
            $this->Session->setFlash(__('The type has been deleted.'));
        } else {
            $this->Session->setFlash(__('The type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function lists()
    {
        if (!empty($this->request->query['q'])) {
            $q = trim(strtolower($this->request->query['q']));
            $q = '%' . $q . '%';
            $tags = $this->Type->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'Type.active' => 1,
                    //'LOWER(Type.name) LIKE' => $q
                    'LOWER(Type.description) LIKE' => $q
                ),
                //'fields' => array('Type.id', 'Type.name', 'Type.description'),
                'fields' => array('Type.id', 'Type.description'),
                'limit' => 3,
                //'order' => array('Type.name' => 'ASC')
                'order' => array('Type.description' => 'ASC')
            ));

            $data = array();
            $i = 0;
            foreach ($tags as $tag) {
                $data[$i]['value'] = $tag['Type']['id'];
                $data[$i]['text'] = $tag['Type']['description'];
                //$data[$i]['text'] = $tag['Type']['name'];
                $i++;
            }
        }


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function jajal($text = null) {
        $this->autoRender = false;
        $acronym = '';
        $words = preg_split("/\s+/", $text);
        foreach($words as $word) {
            $acronym .= strtoupper($word[0]);
        }
        print_r($acronym);
    }
}
