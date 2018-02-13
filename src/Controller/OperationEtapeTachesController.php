<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationEtapeTaches Controller
 *
 * @property \App\Model\Table\OperationEtapeTachesTable $OperationEtapeTaches */
class OperationEtapeTachesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['OperationEtapeTaches.modified' => 'DESC'],
            'contain' => ['Utilisateurs', 'Operations'=> ['Demandes'=> ['PartenaireClients'], 'OperationTypes'], 'Etapes', 'Taches']
        ];
        $operationEtapeTaches = $this->paginate($this->OperationEtapeTaches);
        $this->set(compact('operationEtapeTaches'));
        $this->set('_serialize', ['operationEtapeTaches']);
    }

        /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function indexencours()
    {
        $this->paginate = [
            'order' => ['OperationEtapeTaches.modified' => 'DESC'],
            'contain' => ['Utilisateurs', 'Operations'=> ['Demandes'=> ['PartenaireClients'], 'OperationTypes'], 'Etapes', 'Taches'],
            'conditions' => ['OperationEtapeTaches.date_fin is' => null]
        ];
        $operationEtapeTaches = $this->paginate($this->OperationEtapeTaches);
        $this->set(compact('operationEtapeTaches'));
        $this->set('_serialize', ['operationEtapeTaches']);
    }


    /**
     * View method
     *
     * @param string|null $id Operation Etape Tach id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationEtapeTach = $this->OperationEtapeTaches->get($id, [
            'contain' => ['Utilisateurs', 'Operations', 'Etapes', 'Taches']
        ]);
        //debug($operationEtapeTach);
        //die();  
        //$OperationEtapeTaches = $this->Operations->OperationEtapeTaches->findByOperationId($operationEtapeTach->id)->contain(['Utilisateurs', 'Etapes', 'Taches'])->all();
        $this->set('operationEtapeTach', $operationEtapeTach);
        $this->set('_serialize', ['operationEtapeTach']);

        //$this->set(compact('operationEtapeTach','OperationEtapeTaches'));
        //$this->set('_serialize', ['operationEtapeTach']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($operation_id = null)
    {
        $utilisateurs_id = $this->Auth->user('id');
        $operationEtapeTach = $this->OperationEtapeTaches->newEntity();
        if ($this->request->is('post')) {
            $operationEtapeTach = $this->OperationEtapeTaches->patchEntity($operationEtapeTach, $this->request->getData());
            if ($this->OperationEtapeTaches->save($operationEtapeTach)) {
                $this->Flash->success(__('The operation etape tach has been saved.'));

                return $this->redirect(['action' => 'index']);
                //return $this->redirect(['controller' => 'Operations', 'action' => 'view',$operationEtapeTach->operation_id]);
            }
            $this->Flash->error(__('The operation etape tach could not be saved. Please, try again.'));
        }
        $operationEtapeTach->set('operation_id', $operation_id);
        $operationEtapeTach->set('utilisateurs_id', $utilisateurs_id);
        $utilisateurs = $this->OperationEtapeTaches->Utilisateurs->find('list', ['limit' => 200]);
        $operations = $this->OperationEtapeTaches->Operations->find('list', ['limit' => 200]);
        $etapes = $this->OperationEtapeTaches->Etapes->find('list', ['limit' => 200]);
        $taches = $this->OperationEtapeTaches->Taches->find('list', ['limit' => 200]);
        $this->set(compact('operationEtapeTach', 'utilisateurs', 'operations', 'etapes', 'taches', 'operation_id', 'utilisateurs_id'));
        $this->set('_serialize', ['operationEtapeTach']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addsuivantetape($operation_id = null, $demande_id = null)
    {
        $operationEtapeTach = $this->OperationEtapeTaches->newEntity();
        if ($this->request->is('post')) {
            $operationEtapeTach = $this->OperationEtapeTaches->patchEntity($operationEtapeTach, $this->request->getData());
            if ($this->OperationEtapeTaches->save($operationEtapeTach)) {
                $this->Flash->success(__('The operation etape tach has been saved.'));

                //return $this->redirect(['action' => 'index']);
                //return $this->redirect(['controller' => 'Operations', 'action' => 'view',$operationEtapeTach->operation_id]);
                return $this->redirect(['controller' => 'Operations', 'action' => 'view',$this->request->getData('operation_id')]);
            }
            $this->Flash->error(__('The operation etape tach could not be saved. Please, try again.'));
        }
        $operationEtapeTach->set('operation_id', $operation_id);
        //debug($operationEtapeTach);
        //die();
        $utilisateurs = $this->OperationEtapeTaches->Utilisateurs->find('list', ['limit' => 200]);
        $operations = $this->OperationEtapeTaches->Operations->find('list', ['limit' => 200]);
        $etapes = $this->OperationEtapeTaches->Etapes->find('list', ['limit' => 200]);
        $taches = $this->OperationEtapeTaches->Taches->find('list', ['limit' => 200]);
        $this->set(compact('operationEtapeTach', 'utilisateurs', 'operations', 'etapes', 'taches', 'demande_id', 'operation_id'));
        $this->set('_serialize', ['operationEtapeTach']);
    }

        /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addformoperaitons($demande_id = null, $operation_id = null)
    {
        $operationEtapeTach = $this->OperationEtapeTaches->newEntity();
        if ($this->request->is('post')) {
            $operationEtapeTach = $this->OperationEtapeTaches->patchEntity($operationEtapeTach, $this->request->getData());
            if ($this->OperationEtapeTaches->save($operationEtapeTach)) {
                $this->Flash->success(__('The operation etape tach has been saved.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'Operations', 'action' => 'view',$this->request->getData('operation_id')]);
            }
            $this->Flash->error(__('The operation etape tach could not be saved. Please, try again.'));
        }
        $operationEtapeTach->set('operation_id', $operation_id);
        $utilisateurs = $this->OperationEtapeTaches->Utilisateurs->find('list', ['limit' => 200]);
        $operations = $this->OperationEtapeTaches->Operations->find('list', ['limit' => 200]);
        $etapes = $this->OperationEtapeTaches->Etapes->find('list', ['limit' => 200]);
        $taches = $this->OperationEtapeTaches->Taches->find('list', ['limit' => 200]);
        $this->set(compact('operationEtapeTach', 'utilisateurs', 'operations', 'etapes', 'taches','demande_id', 'operation_id'));
        $this->set('_serialize', ['operationEtapeTach']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Operation Etape Tach id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationEtapeTach = $this->OperationEtapeTaches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationEtapeTach = $this->OperationEtapeTaches->patchEntity($operationEtapeTach, $this->request->getData());
            if ($this->OperationEtapeTaches->save($operationEtapeTach)) {
                $this->Flash->success(__('The operation etape tach has been saved.'));
                
                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error(__('The operation etape tach could not be saved. Please, try again.'));
        }
        $utilisateurs = $this->OperationEtapeTaches->Utilisateurs->find('list', ['limit' => 200]);
        $operations = $this->OperationEtapeTaches->Operations->find('list', ['limit' => 200]);
        $etapes = $this->OperationEtapeTaches->Etapes->find('list', ['limit' => 200]);
        $taches = $this->OperationEtapeTaches->Taches->find('list', ['limit' => 200]);
        $this->set(compact('operationEtapeTach', 'utilisateurs', 'operations', 'etapes', 'taches'));
        $this->set('_serialize', ['operationEtapeTach']);
    }

    public function editfromoperattion($operation_id = null, $id = null)
    {
        $operationEtapeTach = $this->OperationEtapeTaches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationEtapeTach = $this->OperationEtapeTaches->patchEntity($operationEtapeTach, $this->request->getData());
            if ($this->OperationEtapeTaches->save($operationEtapeTach)) {
                $this->Flash->success(__('The operation etape tach has been saved.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'Operations', 'action' => 'view',$this->request->getData('operation_id')]);

            }
            $this->Flash->error(__('The operation etape tach could not be saved. Please, try again.'));
        }
        $utilisateurs = $this->OperationEtapeTaches->Utilisateurs->find('list', ['limit' => 200]);
        $operations = $this->OperationEtapeTaches->Operations->find('list', ['limit' => 200]);
        $etapes = $this->OperationEtapeTaches->Etapes->find('list', ['limit' => 200]);
        $taches = $this->OperationEtapeTaches->Taches->find('list', ['limit' => 200]);
        $this->set(compact('operationEtapeTach', 'utilisateurs', 'operations', 'etapes', 'taches'));
        $this->set('_serialize', ['operationEtapeTach']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Etape Tach id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationEtapeTach = $this->OperationEtapeTaches->get($id);
        if ($this->OperationEtapeTaches->delete($operationEtapeTach)) {
            $this->Flash->success(__('The operation etape tach has been deleted.'));
        } else {
            $this->Flash->error(__('The operation etape tach could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
