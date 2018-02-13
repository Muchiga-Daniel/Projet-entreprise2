<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routeurs Controller
 *
 * @property \App\Model\Table\RouteursTable $Routeurs */
class RouteursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $routeurs = $this->paginate($this->Routeurs);

        $this->set(compact('routeurs'));
        $this->set('_serialize', ['routeurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Routeur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routeur = $this->Routeurs->get($id, [
            'contain' => ['OffreInitiales', 'Operations']
        ]);

        $this->set('routeur', $routeur);
        $this->set('_serialize', ['routeur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routeur = $this->Routeurs->newEntity();
        if ($this->request->is('post')) {
            $routeur = $this->Routeurs->patchEntity($routeur, $this->request->getData());
            if ($this->Routeurs->save($routeur)) {
                $this->Flash->success(__('The routeur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routeur could not be saved. Please, try again.'));
        }
        $this->set(compact('routeur'));
        $this->set('_serialize', ['routeur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Routeur id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routeur = $this->Routeurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routeur = $this->Routeurs->patchEntity($routeur, $this->request->getData());
            if ($this->Routeurs->save($routeur)) {
                $this->Flash->success(__('The routeur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routeur could not be saved. Please, try again.'));
        }
        $this->set(compact('routeur'));
        $this->set('_serialize', ['routeur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Routeur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routeur = $this->Routeurs->get($id);
        if ($this->Routeurs->delete($routeur)) {
            $this->Flash->success(__('The routeur has been deleted.'));
        } else {
            $this->Flash->error(__('The routeur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addpopup()
    {
        $routeur = $this->Routeurs->newEntity();
        $this->autoRender = false;
        if($this->request->is('ajax'))
        {
            if ($this->request->is('post'))
            {
                $routeur = $this->routeurs->patchEntity($routeur, $this->request->getData());
                if ($this->routeurs->save($routeur))
                {
                    //$this->Flash->success(__('The contacthas been saved.'));
                    $data = '<option value="'.$routeur->id.'" selected >'.$routeur->nom.'</option>';
                    $response['data'] = $data;
                    $response['status'] = 'saved';
                    $response['champtype'] = 'routeur';
                    $response['message'] = '<div class="message success" onclick="this.classList.add(\'hidden\')">The routeur has been saved.</div>';
                    echo json_encode($response);
                }
                else 
                {
                    //$this->Flash->error(__('The contactcould not be saved. Please, try again.'));
                    $response['data'] = "";
                    $response['status'] = 'error';
                    $response['champtype'] = 'routeur';
                    $response['message'] = '<div class="message success couldnot" onclick="this.classList.add(\'hidden\')">The routeur could not be saved. Please, try again.</div>';
                    echo json_encode($response);
                }
            }
            else
            {
                $this->set(compact('routeur'));
                $this->set('_serialize', ['routeur']);
                $this->render('addpopup', 'ajax');

            }
        }
    }
}
