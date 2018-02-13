<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ext1kfactureOperations Controller
 *
 * @property \App\Model\Table\Ext1kfactureOperationsTable $Ext1kfactureOperations */
class Ext1kfactureOperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Operations', 'Statuts']
        ];
        $ext1kfactureOperations = $this->paginate($this->Ext1kfactureOperations);

        $this->set(compact('ext1kfactureOperations'));
        $this->set('_serialize', ['ext1kfactureOperations']);
    }

    /**
     * View method
     *
     * @param string|null $id Ext1kfacture Operation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ext1kfactureOperation = $this->Ext1kfactureOperations->get($id, [
            'contain' => ['Operations', 'Statuts']
        ]);

        $this->set('ext1kfactureOperation', $ext1kfactureOperation);
        $this->set('_serialize', ['ext1kfactureOperation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ext1kfactureOperation = $this->Ext1kfactureOperations->newEntity();
        if ($this->request->is('post')) {
            $ext1kfactureOperation = $this->Ext1kfactureOperations->patchEntity($ext1kfactureOperation, $this->request->getData());
            $ext1kfactureOperation->set('statut_id',1);
            if ($this->Ext1kfactureOperations->save($ext1kfactureOperation)) {
                $this->Flash->success(__('The ext1kfacture operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ext1kfacture operation could not be saved. Please, try again.'));
        }
        $operations = $this->Ext1kfactureOperations->Operations->find('list', ['limit' => 200]);
        $statuts = $this->Ext1kfactureOperations->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('ext1kfactureOperation', 'operations', 'statuts'));
        $this->set('_serialize', ['ext1kfactureOperation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ext1kfacture Operation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ext1kfactureOperation = $this->Ext1kfactureOperations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ext1kfactureOperation = $this->Ext1kfactureOperations->patchEntity($ext1kfactureOperation, $this->request->getData());
            if ($this->Ext1kfactureOperations->save($ext1kfactureOperation)) {
                $this->Flash->success(__('The ext1kfacture operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ext1kfacture operation could not be saved. Please, try again.'));
        }
        $operations = $this->Ext1kfactureOperations->Operations->find('list', ['limit' => 200]);
        $statuts = $this->Ext1kfactureOperations->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('ext1kfactureOperation', 'operations', 'statuts'));
        $this->set('_serialize', ['ext1kfactureOperation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ext1kfacture Operation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ext1kfactureOperation = $this->Ext1kfactureOperations->get($id);
        if ($this->Ext1kfactureOperations->delete($ext1kfactureOperation)) {
            $this->Flash->success(__('The ext1kfacture operation has been deleted.'));
        } else {
            $this->Flash->error(__('The ext1kfacture operation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
