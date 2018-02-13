<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UtilisateurTypes Controller
 *
 * @property \App\Model\Table\UtilisateurTypesTable $UtilisateurTypes */
class UtilisateurTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $utilisateurTypes = $this->paginate($this->UtilisateurTypes);

        $this->set(compact('utilisateurTypes'));
        $this->set('_serialize', ['utilisateurTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Utilisateur Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utilisateurType = $this->UtilisateurTypes->get($id, [
            'contain' => ['Utilisateurs']
        ]);

        $this->set('utilisateurType', $utilisateurType);
        $this->set('_serialize', ['utilisateurType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utilisateurType = $this->UtilisateurTypes->newEntity();
        if ($this->request->is('post')) {
            $utilisateurType = $this->UtilisateurTypes->patchEntity($utilisateurType, $this->request->getData());
            if ($this->UtilisateurTypes->save($utilisateurType)) {
                $this->Flash->success(__('The utilisateur type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilisateur type could not be saved. Please, try again.'));
        }
        $this->set(compact('utilisateurType'));
        $this->set('_serialize', ['utilisateurType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Utilisateur Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $utilisateurType = $this->UtilisateurTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utilisateurType = $this->UtilisateurTypes->patchEntity($utilisateurType, $this->request->getData());
            if ($this->UtilisateurTypes->save($utilisateurType)) {
                $this->Flash->success(__('The utilisateur type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilisateur type could not be saved. Please, try again.'));
        }
        $this->set(compact('utilisateurType'));
        $this->set('_serialize', ['utilisateurType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Utilisateur Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utilisateurType = $this->UtilisateurTypes->get($id);
        if ($this->UtilisateurTypes->delete($utilisateurType)) {
            $this->Flash->success(__('The utilisateur type has been deleted.'));
        } else {
            $this->Flash->error(__('The utilisateur type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
