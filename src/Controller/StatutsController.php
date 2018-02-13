<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statuts Controller
 *
 * @property \App\Model\Table\StatutsTable $Statuts */
class StatutsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $statuts = $this->paginate($this->Statuts);

        $this->set(compact('statuts'));
        $this->set('_serialize', ['statuts']);
    }

    /**
     * View method
     *
     * @param string|null $id Statut id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $statut = $this->Statuts->get($id, [
            'contain' => ['Demandes', 'Ext1kfactureOperations', 'OffreInitiales', 'Operations']
        ]);

        $this->set('statut', $statut);
        $this->set('_serialize', ['statut']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $statut = $this->Statuts->newEntity();
        if ($this->request->is('post')) {
            $statut = $this->Statuts->patchEntity($statut, $this->request->getData());
            if ($this->Statuts->save($statut)) {
                $this->Flash->success(__('The statut has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statut could not be saved. Please, try again.'));
        }
        $this->set(compact('statut'));
        $this->set('_serialize', ['statut']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Statut id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $statut = $this->Statuts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statut = $this->Statuts->patchEntity($statut, $this->request->getData());
            if ($this->Statuts->save($statut)) {
                $this->Flash->success(__('The statut has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statut could not be saved. Please, try again.'));
        }
        $this->set(compact('statut'));
        $this->set('_serialize', ['statut']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Statut id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $statut = $this->Statuts->get($id);
        if ($this->Statuts->delete($statut)) {
            $this->Flash->success(__('The statut has been deleted.'));
        } else {
            $this->Flash->error(__('The statut could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
