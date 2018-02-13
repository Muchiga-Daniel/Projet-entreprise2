<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OffreInitialeOperations Controller
 *
 * @property \App\Model\Table\OffreInitialeOperationsTable $OffreInitialeOperations */
class OffreInitialeOperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['OffreInitialeOperations.modified' => 'DESC'],
            'contain' => ['OffreInitiales']
        ];
        $offreInitialeOperations = $this->paginate($this->OffreInitialeOperations);

        $this->set(compact('offreInitialeOperations'));
        $this->set('_serialize', ['offreInitialeOperations']);
    }

    /**
     * View method
     *
     * @param string|null $id Offre Initiale Operation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offreInitialeOperation = $this->OffreInitialeOperations->get($id, [
            'contain' => ['OffreInitiales','Operations']
        ]);

        $this->set('offreInitialeOperation', $offreInitialeOperation);
        $this->set('_serialize', ['offreInitialeOperation']);
    }

    /**
     * Add method 
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offreInitialeOperation = $this->OffreInitialeOperations->newEntity();
        if ($this->request->is('post')) {
            $offreInitialeOperation = $this->OffreInitialeOperations->patchEntity($offreInitialeOperation, $this->request->getData());
            if ($this->OffreInitialeOperations->save($offreInitialeOperation)) {
                $this->Flash->success(__('The offre initiale operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre initiale operation could not be saved. Please, try again.'));
        }
        $offreInitiales = $this->OffreInitialeOperations->OffreInitiales->find('list', ['limit' => 200]);
        $operations = $this->OffreInitialeOperations->Operations->find('list', ['limit' => 200]);
        $this->set(compact('offreInitialeOperation', 'offreInitiales', 'operations'));
        $this->set('_serialize', ['offreInitialeOperation']); 
    }


    /**
     * Add method 
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addfromoffreinites($offre_initiale_id = null)
    {
        $offreInitialeOperation = $this->OffreInitialeOperations->newEntity();
        if ($this->request->is('post')) {
            $offreInitialeOperation = $this->OffreInitialeOperations->patchEntity($offreInitialeOperation, $this->request->getData());
            if ($this->OffreInitialeOperations->save($offreInitialeOperation)) {
                $this->Flash->success(__('The offre initiale operation has been saved.'));
                
                //OffreInitialesController::calculoffres($offre_initiale_id);

                $OffreInitiales = new OffreInitialesController();
                $OffreInitiales->calculoffres($offre_initiale_id,$this->OffreInitialeOperations->Operations->find()->all());
                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'OffreInitiales', 'action' => 'view',$this->request->getData('offre_initiale_id')]);
            }
            $this->Flash->error(__('The offre initiale operation could not be saved. Please, try again.'));
        }
        $offreInitialeOperation->set('offre_initiale_id', $offre_initiale_id);
        $offreInitiales = $this->OffreInitialeOperations->OffreInitiales->find('list', ['limit' => 300]);
        $operations = $this->OffreInitialeOperations->Operations->find('list', ['limit' => 200]);
        $this->set(compact('offreInitialeOperation', 'offreInitiales', 'operations', 'offre_initiale_id'));
        $this->set('_serialize', ['offreInitialeOperation']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Offre Initiale Operation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offreInitialeOperation = $this->OffreInitialeOperations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offreInitialeOperation = $this->OffreInitialeOperations->patchEntity($offreInitialeOperation, $this->request->getData());
            if ($this->OffreInitialeOperations->save($offreInitialeOperation)) {
                $this->Flash->success(__('The offre initiale operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre initiale operation could not be saved. Please, try again.'));
        }
        $offreInitiales = $this->OffreInitialeOperations->OffreInitiales->find('list', ['limit' => 200]);
        $operations = $this->OffreInitialeOperations->Operations->find('list', ['limit' => 200]);
        $this->set(compact('offreInitialeOperation', 'offreInitiales', 'operations'));
        $this->set('_serialize', ['offreInitialeOperation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offre Initiale Operation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offreInitialeOperation = $this->OffreInitialeOperations->get($id);
        if ($this->OffreInitialeOperations->delete($offreInitialeOperation)) {
            $this->Flash->success(__('The offre initiale operation has been deleted.'));
        } else {
            $this->Flash->error(__('The offre initiale operation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
