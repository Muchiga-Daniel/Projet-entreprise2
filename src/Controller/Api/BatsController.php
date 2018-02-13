<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Bats Controller
 *
 * @property \App\Model\Table\BatsTable $Bats */
class BatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->lists();
    }

    public function lists()
    {
        //$bat = $this->Bats->find()->select(['id','designation'])->contain(['Demandes' => ['fields' => ['Demandes__code_affaire' => 'code_affaire']]])->all();
        $bat = $this->Bats->find()->select(['id','designation'])->where(['deleted' => 0])->all();
        $this->set(compact(['bat']));
        $this->set('_serialize', ['bat']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Bat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$bat = $this->Bats->findById($id)->select(['id','designation','senderlabel','content'])->contain(['Demandes' => ['fields' => ['Demmandes__code_affaire' => 'code_affaire']]])->all();
        $bat = $this->Bats->findById($id)->select(['id','designation','senderlabel','content'])->all();
        $this->set(compact(['bat']));
        $this->set('_serialize', ['bat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        if($id !== null){
            $bat = $this->Bats->get($id, ['contain' => []]);
        }else{
            $bat = $this->Bats->newEntity();
        }
        if ($this->request->is(['post', 'put'])) {
            $bat = $this->Bats->patchEntity($bat, $this->request->getData());
            if (!$this->Bats->save($bat)) {
                $bat['error_message'] = 'The bat could not be saved. Please, try again.';
            }
        }
        $this->set(compact(['bat']));
        $this->set('_serialize', ['bat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bat id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*
    public function edit($id = null)
    {
        $bat = $this->Bats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bat = $this->Bats->patchEntity($bat, $this->request->getData());
            if ($this->Bats->save($bat)) {
                $this->Flash->success(__('The bat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bat could not be saved. Please, try again.'));
        }
        $this->set(compact('bat'));
        $this->set('_serialize', ['bat']);
    }
    */

    /**
     * Delete method
     *
     * @param string|null $id Bat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function delete($id = null)
    {
        if( $this->request->allowMethod(['post', 'delete']) && $id !== null ) {
            $bat = $this->Bats->get($id);
            $bat->deleted = 1;
            if (!$this->Bats->save($bat)) {
                $response['error_message'] = 'The bat could not be deleted. Please, try again.';
            }
            $response['message'] = "Bat deleted.";
        }
        $this->set(compact(['response']));
        $this->set('_serialize', ['response']);
    }
    
}
