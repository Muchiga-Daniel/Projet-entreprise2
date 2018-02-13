<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Etapes Controller
 *
 * @property \App\Model\Table\EtapesTable $Etapes */
class EtapesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $etapes = $this->paginate($this->Etapes);

        $this->set(compact('etapes'));
        $this->set('_serialize', ['etapes']);
    }

    /**
     * View method
     *
     * @param string|null $id Etape id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etape = $this->Etapes->get($id, [
            'contain' => ['Taches'//, 'OperationEtapeTaches'
            ]
        ]);

        $this->set('etape', $etape);
        $this->set('_serialize', ['etape']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etape = $this->Etapes->newEntity();
        if ($this->request->is('post')) {
            $etape = $this->Etapes->patchEntity($etape, $this->request->getData());
            if ($this->Etapes->save($etape)) {
                $this->Flash->success(__('The etape has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etape could not be saved. Please, try again.'));
        }
        $this->set(compact('etape'));
        $this->set('_serialize', ['etape']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etape id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etape = $this->Etapes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etape = $this->Etapes->patchEntity($etape, $this->request->getData());
            if ($this->Etapes->save($etape)) {
                $this->Flash->success(__('The etape has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etape could not be saved. Please, try again.'));
        }
        $this->set(compact('etape'));
        $this->set('_serialize', ['etape']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etape id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etape = $this->Etapes->get($id);
        if ($this->Etapes->delete($etape)) {
            $this->Flash->success(__('The etape has been deleted.'));
        } else {
            $this->Flash->error(__('The etape could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
