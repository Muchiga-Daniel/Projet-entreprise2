<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Utilisateurs Controller
 *
 * @property \App\Model\Table\UtilisateursTable $Utilisateurs */
class UtilisateursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UtilisateurTypes']
        ];
        $utilisateurs = $this->paginate($this->Utilisateurs);

        $this->set(compact('utilisateurs'));
        $this->set('_serialize', ['utilisateurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Utilisateur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utilisateur = $this->Utilisateurs->get($id, [
            'contain' => [//'UtilisateurTypes', 'Demandes', 'OffreInitiales', 'OperationEtapeTaches', 'Operations'
            ]
        ]);

        $this->set('utilisateur', $utilisateur);
        $this->set('_serialize', ['utilisateur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utilisateur = $this->Utilisateurs->newEntity();
        if ($this->request->is('post')) {
            $utilisateur = $this->Utilisateurs->patchEntity($utilisateur, $this->request->getData());
            if ($this->Utilisateurs->save($utilisateur)) {
                $this->Flash->success(__('The utilisateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilisateur could not be saved. Please, try again.'));
        }
        $utilisateurTypes = $this->Utilisateurs->UtilisateurTypes->find('list', ['limit' => 200,'fields' => ['id','designation']]);

        $this->set(compact('utilisateur', 'utilisateurTypes'));
        $this->set('_serialize', ['utilisateur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Utilisateur id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $utilisateur = $this->Utilisateurs->get($id, [
            'contain' => ['UtilisateurTypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utilisateur = $this->Utilisateurs->patchEntity($utilisateur, $this->request->getData());
            if ($this->Utilisateurs->save($utilisateur)) {
                $this->Flash->success(__('The utilisateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilisateur could not be saved. Please, try again.'));
        }
        $utilisateurTypes = $this->Utilisateurs->UtilisateurTypes->find('list',['limit' => '200']);
        $this->set(compact('utilisateur', 'utilisateurTypes'));
        $this->set('_serialize', ['utilisateur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Utilisateur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utilisateur = $this->Utilisateurs->get($id);
        if ($this->Utilisateurs->delete($utilisateur)) {
            $this->Flash->success(__('The utilisateur has been deleted.'));
        } else {
            $this->Flash->error(__('The utilisateur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $utilisateur = $this->Auth->identify();
            if ($utilisateur) {
                $this->Auth->setUser($utilisateur);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
