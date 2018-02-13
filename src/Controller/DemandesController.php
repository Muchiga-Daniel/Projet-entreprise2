<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Demandes Controller
 *
 * @property \App\Model\Table\DemandesTable $Demandes */
class DemandesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['Demandes.modified' => 'DESC'],
            'contain' => ['PartenaireClients', 'ContactClients', 'PartenaireFactures', 'ContactFactures', 'Utilisateurs', 'Statuts', 'Operations']
        ];
        $demandes = $this->paginate($this->Demandes);
        //debug($demandes);
        //die();

        $this->set(compact('demandes', 'Operations'));
        $this->set('_serialize', ['demandes']);
    }

    /**
     * View method
     *
     * @param string|null $id Demande id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $demande = $this->Demandes->get($id, [
            'contain' => ['PartenaireClients', 'ContactClients', 'PartenaireFactures', 'ContactFactures', 'Utilisateurs', 'Statuts', 'OffreInitiales', 'Operations' => ['Routeurs', 'OperationTypes', 'Utilisateurs','Statuts', 'Statuts', 'Ext1kfactureOperations', 'Routeurs', 'OperationEtapeTaches' => ['Etapes','Taches']]]
        ]);
        $operations = TableRegistry::get('Operations')->find('all')->where(['demande_id' => $demande->id])->contain(['OperationTypes','Utilisateurs','Statuts'])->all();
        $this->set(compact('demande','operations'));
        $this->set('_serialize', ['demande']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utilisateurs_id = $this->Auth->user('id');
        $demande = $this->Demandes->newEntity();
        if ($this->request->is('post')) {
            $demande = $this->Demandes->patchEntity($demande, $this->request->getData());
            $demande->set('statut_id',1);
            $demande->set('code_affaire','DXXXX');
            if ($this->Demandes->save($demande)) {
                $demande->set('code_affaire','D'.$demande->id);
                $this->Demandes->save($demande);
                $this->Flash->success(__('The demande has been saved.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'Demandes','action' => 'view',$demande->id]);
            }
            $this->Flash->error(__('The demande could not be saved. Please, try again.'));
        }
        $demande->set('utilisateurs_id', $utilisateurs_id);
        $partenaireClients = $this->Demandes->PartenaireClients->find('list');
        $contactClients = $this->Demandes->ContactClients->find('list');
        $partenaireFactures = $this->Demandes->PartenaireFactures->find('list');
        $contactFactures = $this->Demandes->ContactFactures->find('list');
        $utilisateurs = $this->Demandes->Utilisateurs->find('list');
        $statuts = $this->Demandes->Statuts->find('list');
        $this->set(compact('demande', 'partenaireClients', 'contactClients', 'partenaireFactures', 'contactFactures', 'utilisateurs', 'statuts', 'utilisateurs_id'));
        $this->set('_serialize', ['demande']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Demande id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $demande = $this->Demandes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $demande = $this->Demandes->patchEntity($demande, $this->request->getData());
            if ($this->Demandes->save($demande)) {
                $this->Flash->success(__('The demande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The demande could not be saved. Please, try again.'));
        }
        $partenaireClients = $this->Demandes->PartenaireClients->find('list', ['limit' => 200]);
        $contactClients = $this->Demandes->ContactClients->find('list', ['limit' => 200]);
        $partenaireFactures = $this->Demandes->PartenaireFactures->find('list', ['limit' => 200]);
        $contactFactures = $this->Demandes->ContactFactures->find('list', ['limit' => 200]);
        $utilisateurs = $this->Demandes->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->Demandes->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('demande', 'partenaireClients', 'contactClients', 'partenaireFactures', 'contactFactures', 'utilisateurs', 'statuts'));
        $this->set('_serialize', ['demande']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Demande id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $demande = $this->Demandes->get($id);
        if ($this->Demandes->delete($demande)) {
            $this->Flash->success(__('The demande has been deleted.'));
        } else {
            $this->Flash->error(__('The demande could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
