<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OffreInitiales Controller
 *
 * @property \App\Model\Table\OffreInitialesTable $OffreInitiales */
class OffreInitialesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['OffreInitiales.modified' => 'DESC'],
            'contain' => ['Partenaires', 'Demandes', 'Utilisateurs', 'Statuts', 'OffreInitialeOperations']
        ];
        $offreInitiales = $this->paginate($this->OffreInitiales);

        $this->set(compact('offreInitiales'));
        $this->set('_serialize', ['offreInitiales']);
    }

    /**
     * View method
     *
     * @param string|null $id Offre Initiale id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offreInitiale = $this->OffreInitiales->get($id, [
            'contain' => ['Partenaires', 'Demandes' => ['PartenaireClients'], 'Utilisateurs', 'Statuts', 'OffreInitialeOperations' => ['Operations' => ['Demandes', 'OperationTypes', 'Utilisateurs','Statuts', 'Statuts', 'Ext1kfactureOperations', 'Routeurs', 'OperationEtapeTaches' => ['Etapes','Taches']]]]
        ]);

        //$this->set('offreInitiale', $offreInitiale);
        $this->set(compact('offreInitiale'));
        $this->set('_serialize', ['offreInitiale']);
    }

    /**
     * Add method 
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offreInitiale = $this->OffreInitiales->newEntity();
        if ($this->request->is('post')) {
            $offreInitiale = $this->OffreInitiales->patchEntity($offreInitiale, $this->request->getData());
            $offreInitiale->set('statut_id',1);
            if ($this->OffreInitiales->save($offreInitiale)) {
                $this->Flash->success(__('The offre initiale has been saved.'));

                return $this->redirect(['action' => 'index']);
               // return $this->redirect(['controller' => 'Operations', 'action' => 'view',$offreInitiale->id]);
            }
            $this->Flash->error(__('The offre initiale could not be saved. Please, try again.'));
        }
        $partenaires = $this->OffreInitiales->Partenaires->find('list', ['limit' => 200]);
        $demandes = $this->OffreInitiales->Demandes->find('list', ['limit' => 200]);
        $utilisateurs = $this->OffreInitiales->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->OffreInitiales->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('offreInitiale', 'partenaires', 'demandes', 'utilisateurs', 'statuts'));
        $this->set('_serialize', ['offreInitiale']);
    }

        /**
     * Add method 
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addfromdemande($demande_id = null)
    {
        $offreInitiale = $this->OffreInitiales->newEntity();
        if ($this->request->is('post')) {
            $offreInitiale = $this->OffreInitiales->patchEntity($offreInitiale, $this->request->getData());
            $offreInitiale->set('statut_id',1);
            if ($this->OffreInitiales->save($offreInitiale)) {
                $this->Flash->success(__('The offre initiale has been saved.'));

                return $this->redirect(['action' => 'index']);
               // return $this->redirect(['controller' => 'Operations', 'action' => 'view',$offreInitiale->id]);
            }
            $this->Flash->error(__('The offre initiale could not be saved. Please, try again.'));
        }
        $offreInitiale->set('demande_id', $demande_id);
        $partenaires = $this->OffreInitiales->Partenaires->find('list', ['limit' => 200]);
        $demandes = $this->OffreInitiales->Demandes->find('list', ['limit' => 200]);
        $utilisateurs = $this->OffreInitiales->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->OffreInitiales->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('offreInitiale', 'partenaires', 'demandes', 'utilisateurs', 'statuts', 'demande_id'));
        $this->set('_serialize', ['offreInitiale']);
    }

              /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */

    public function addlesoperations($demande_id = null, $partenaire_facture_id = null, $operation_id = null )
    {
        $offreInitiale = $this->OffreInitiales->newEntity();
        $offreInitiale->demande_id = $demande_id;
        $offreInitiale->statut_id = 1;
        $offreInitiale->utilisateur_id = $this->Auth->user('id');
        $offreInitiale->partenaire_id = $partenaire_facture_id;
        $PostGet_Data = $this->request->getData();
        if ($this->request->is('post')) {
            $PostGet_Data = $this->request->getData();
            $offreInitiale = $this->OffreInitiales->patchEntity($offreInitiale, $PostGet_Data);
            if ($this->OffreInitiales->save($offreInitiale)) {

                //offreinitialoperation
                foreach($PostGet_Data["Operation_id"] as $operation_id) {
                    if(isset($offreInitialeOperation)) unset($offreInitialeOperation);
                    $offreInitialeOperation = $this->OffreInitiales->OffreInitialeOperations->newEntity();
                    $offreInitialeOperation = $this->OffreInitiales->OffreInitialeOperations->patchEntity($offreInitialeOperation, ['offre_initiale_id' => $offreInitiale->id,'operation_id' => $operation_id]);
                    $this->OffreInitiales->OffreInitialeOperations->save($offreInitialeOperation);
                }

                //calcule offreinitial
                $operation = $this->OffreInitiales->OffreInitialeOperations->Operations->find('all', ['conditions' => ['id IN' => implode(',', $PostGet_Data["Operation_id"])]]);
                $this->calculoffres($offreInitiale->id, $operation);
                //$operation = $this->OffreInitiales->Demandes->Operations->find('all', ['conditions' => ['demande_id' => $demande_id, 'id IN' => implode(',', $PostGet_Data["Operation_id"])]]);

                $this->Flash->success(__('The offre initiale operation has been saved.'));

                return $this->redirect(['controller' => 'OffreInitiales','action' => 'view',$offreInitiale->id]);
            }
            $this->Flash->error(__('The offre initiale operation could not be saved. Please, try again.'));
        }
        $operations = $this->OffreInitiales->OffreInitialeOperations->Operations->find('',['limit' => 200, 'conditions' => ['demande_id' => $demande_id ]])->contain(['OperationTypes']);
        $partenaire_id = $offreInitiale->partenaire_id;
        $this->set(compact('offreInitiale', 'partenaires', 'demandes', 'utilisateurs', 'statuts', 'demande_id', 'operations', 'partenaire_facture_id'));
        $this->set('_serialize', ['offreInitiale']);
    }


  /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addformoperaitons($demande_id = null, $operation_id = null)
    {
        $offreInitiale = $this->OffreInitiales->newEntity();
        if ($this->request->is('post')) { 
            $offreInitiale = $this->OffreInitiales->patchEntity($offreInitiale, $this->request->getData());
            $offreInitiale->set('statut_id',1);
            if ($this->OffreInitiales->save($offreInitiale)) {
                $this->Flash->success(__('The offre initiale has been saved.'));

                return $this->redirect(['controller' => 'Operations', 'action' => 'view',$this->request->getData('operation_id')]);
            }
            $this->Flash->error(__('The offre initiale could not be saved. Please, try again.'));
        }
        $offreInitiale->set('demande_id', $demande_id);
        $partenaires = $this->OffreInitiales->Partenaires->find('list', ['limit' => 200]);
        $demandes = $this->OffreInitiales->Demandes->find('list', ['limit' => 200]);
        $utilisateurs = $this->OffreInitiales->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->OffreInitiales->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('offreInitiale', 'partenaires', 'demandes', 'utilisateurs', 'statuts', 'demande_id','operation_id'));
        $this->set('_serialize', ['offreInitiale']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Offre Initiale id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offreInitiale = $this->OffreInitiales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offreInitiale = $this->OffreInitiales->patchEntity($offreInitiale, $this->request->getData());
            if ($this->OffreInitiales->save($offreInitiale)) {
                $this->Flash->success(__('The offre initiale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre initiale could not be saved. Please, try again.'));
        }
        $partenaires = $this->OffreInitiales->Partenaires->find('list', ['limit' => 200]);
        $demandes = $this->OffreInitiales->Demandes->find('list', ['limit' => 200]);
        $utilisateurs = $this->OffreInitiales->Utilisateurs->find('list', ['limit' => 200]);
        $statuts = $this->OffreInitiales->Statuts->find('list', ['limit' => 200]);
        $this->set(compact('offreInitiale', 'partenaires', 'demandes', 'utilisateurs', 'statuts'));
        $this->set('_serialize', ['offreInitiale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offre Initiale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offreInitiale = $this->OffreInitiales->get($id);
        if ($this->OffreInitiales->delete($offreInitiale)) {
            $this->Flash->success(__('The offre initiale has been deleted.'));
        } else {
            $this->Flash->error(__('The offre initiale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


        /**
     *
     * Calcul d'offre
     *
     */

     public function calculoffres($id = null,$opertaions = null)
   {

        //debug($id);
        //debug($opertaions);
        //die();
       $volume_commande = 0; $volume_facture = 0; $nb_thematique = 0; $cpm = 0; $remise = 0; $ht = 0; $tva = 0; $ttc = 0;
       $offreInitiale = $this->OffreInitiales->get($id, [
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
       $offreInitiale->set('volume_commande',$volume_commande);
       $offreInitiale->set('volume_facture',$volume_facture);
       $offreInitiale->set('nb_thematique',$nb_thematique);
       $offreInitiale->set('cpm',$cpm);
       $offreInitiale->set('remise',$remise);
       $offreInitiale->set('ht',$ht);
       $offreInitiale->set('tva',$tva);
       $offreInitiale->set('ttc',$ttc);
       if ( !($this->OffreInitiales->save($offreInitiale)) ) {
           return false;
       }
       return true;
   }

}
