<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Taches Controller
 *
 * @property \App\Model\Table\TachesTable $Taches */
class TachesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Etapes']
        ];
        $taches = $this->paginate($this->Taches);

        $this->set(compact('taches'));
        $this->set('_serialize', ['taches']);
    }

    /**
     * View method
     *
     * @param string|null $id Tach id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tach = $this->Taches->get($id, [
            'contain' => ['Etapes']
        ]);

        $this->set('tach', $tach);
        $this->set('_serialize', ['tach']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tach = $this->Taches->newEntity();
        if ($this->request->is('post')) {
            $tach = $this->Taches->patchEntity($tach, $this->request->getData());
            if ($this->Taches->save($tach)) {
                $this->Flash->success(__('The tach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tach could not be saved. Please, try again.'));
        }
        $etapes = $this->Taches->Etapes->find('list', ['limit' => 200]);
        $this->set(compact('tach', 'etapes'));
        $this->set('_serialize', ['tach']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tach id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tach = $this->Taches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tach = $this->Taches->patchEntity($tach, $this->request->getData());
            if ($this->Taches->save($tach)) {
                $this->Flash->success(__('The tach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tach could not be saved. Please, try again.'));
        }
        $etapes = $this->Taches->Etapes->find('list', ['limit' => 200]);
        $this->set(compact('tach', 'etapes'));
        $this->set('_serialize', ['tach']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tach id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tach = $this->Taches->get($id);
        if ($this->Taches->delete($tach)) {
            $this->Flash->success(__('The tach has been deleted.'));
        } else {
            $this->Flash->error(__('The tach could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
