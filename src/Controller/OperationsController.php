<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operations Controller
 *
 * @property \App\Model\Table\OperationsTable $Operations */
class OperationsController extends AppController
{

    /**
     * Index method
     * 
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
          'order' => ['Operations.id' => 'DESC'],
            //'contain' => ['Demandes' => ['PartenaireClients'], 'OperationTypes', 'Utilisateurs', 'Statuts','Routeurs', 'FirstOperationEtapeTaches' => ['Etapes' => ['joinType' => 'LEFT'],'Taches' => ['joinType' => 'LEFT']]],
            'contain' => ['Demandes' => ['PartenaireClients'], 'OperationTypes', 'Utilisateurs', 'Statuts','Routeurs', 'OperationEtapeTaches' => ['Etapes','Taches']],
        ];
        //debug($this->paginate);
        //debug($this->Operations);
        $operations = $this->paginate($this->Operations);
        //debug($operations);
        //die();
        $this->set(compact('operations'));
        $this->set('_serialize', ['operations']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operation = $this->Operations->get($id, [
          'contain' => 
            [
              'Demandes'=> ['PartenaireClients'],
              'OperationTypes',
              'Utilisateurs',
              'Statuts',
              'Ext1kfactureOperations',
              'Routeurs',
              'OperationEtapeTaches' => 
                [
                  'sort' => ['OperationEtapeTaches.modified' => 'desc'],
                  'Utilisateurs',
                  'Etapes',
                  'Taches'
                ],
              'OffreInitialeOperations' => 
                [
                  'sort'  => ['OffreInitiales.modified' => 'desc'],
                  'OffreInitiales' => 
                    [
                      'Demandes',
                      'Utilisateurs',
                      'Statuts',
                      'Partenaires'
                    ]
                ]
            ]
        ]);
        $this->set(compact('operation'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($demande_id = null)
    {
        $utilisateurs_id = $this->Auth->user('id');
        $operation = $this->Operations->newEntity();
        if ($this->request->is('post')) {
            $operation = $this->Operations->patchEntity($operation, $this->request->getData()); 
            $operation->set('statut_id',1);
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['controller' => 'Operations','action' => 'view',$operation->id]);
            }
            $this->Flash->error(__('The operation could not be saved. Please, try again.'));
        }
        $operation->set('demande_id', $demande_id);
        $operation->set('utilisateurs_id', $utilisateurs_id);
        $demandes = $this->Operations->Demandes->find('list', ['limit' => 200]);
        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $utilisateurs = $this->Operations->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->Operations->Statuts->find('list', ['limit' => 200]);
        $routeurs = $this->Operations->Routeurs->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'demandes', 'operationTypes', 'utilisateurs', 'statuts','routeurs', 'demande_id', 'utilisateurs_id'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operation = $this->Operations->patchEntity($operation, $this->request->getData());
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operation could not be saved. Please, try again.'));
        }
        $demandes = $this->Operations->Demandes->find('list', ['limit' => 200]);
        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $utilisateurs = $this->Operations->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->Operations->Statuts->find('list', ['limit' => 200]);
        $routeurs = $this->Operations->Routeurs->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'demandes', 'operationTypes', 'utilisateurs', 'statuts','routeurs'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operation = $this->Operations->get($id);
        if ($this->Operations->delete($operation)) {
            $this->Flash->success(__('The operation has been deleted.'));
        } else {
            $this->Flash->error(__('The operation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function calculoffres($id = null,$opertaions = null)
   {

       $volume_commande = 0; $volume_facture = 0; $nb_thematique = 0; $cpm = 0; $remise = 0; $ht = 0; $tva = 0; $ttc = 0;
       $operation = $this->Operations->get($id, [
           'contain' => []
       ]);
       foreach($opertaions as $opertaion)
       {
           $volume_commande += $opertaion->volume_commande;
           $volume_facture += $opertaion->volume_facture;
           $nb_thematique += $opertaion->nb_thematique;
           $cpm += $opertaion->cpm;
           $remise += $opertaion->remise;
           $ht += $opertaion->ht;
           $tva += $opertaion->tva;
           $ttc += $opertaion->ttc;
       }
       $operation->set('volume_commande',$volume_commande);
       $operation->set('volume_facture',$volume_facture);
       $operation->set('nb_thematique',$nb_thematique);
       $operation->set('cpm',$cpm);
       $operation->set('remise',$remise);
       $operation->set('ht',$ht);
       $operation->set('tva',$tva);
       $operation->set('ttc',$ttc);
       if ( !($this->Operations->save($operation)) ) {
           return false;
       }
       return true;
   }
}
