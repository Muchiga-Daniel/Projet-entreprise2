<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Partenaires Controller
 *
 * @property \App\Model\Table\PartenairesTable $Partenaires */
class PartenairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $partenaires = $this->paginate($this->Partenaires);

        $this->set(compact('partenaires'));
        $this->set('_serialize', ['partenaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Partenaire id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partenaire = $this->Partenaires->get($id, [
            'contain' => ['Contacts']//, 'OffreInitiales']
        ]);

        $this->set('partenaire', $partenaire);
        $this->set('_serialize', ['partenaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partenaire = $this->Partenaires->newEntity();
        if ($this->request->is('post')) {
            $partenaire = $this->Partenaires->patchEntity($partenaire, $this->request->getData());
            if ($this->Partenaires->save($partenaire)) {
                $this->Flash->success(__('The partenaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partenaire could not be saved. Please, try again.'));
        }
        $this->set(compact('partenaire'));
        $this->set('_serialize', ['partenaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partenaire id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partenaire = $this->Partenaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partenaire = $this->Partenaires->patchEntity($partenaire, $this->request->getData());
            if ($this->Partenaires->save($partenaire)) {
                $this->Flash->success(__('The partenaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partenaire could not be saved. Please, try again.'));
        }
        $this->set(compact('partenaire'));
        $this->set('_serialize', ['partenaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partenaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partenaire = $this->Partenaires->get($id);
        if ($this->Partenaires->delete($partenaire)) {
            $this->Flash->success(__('The partenaire has been deleted.'));
        } else {
            $this->Flash->error(__('The partenaire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addpopup()
    {
        $partenaire = $this->Partenaires->newEntity();
        $this->autoRender = false;
        if($this->request->is('ajax'))
        {
            if ($this->request->is('post'))
            {
                $partenaire = $this->Partenaires->patchEntity($partenaire, $this->request->getData());
                if ($this->Partenaires->save($partenaire))
                {
                    //$this->Flash->success(__('The partenaire has been saved.'));
                    $data = '<option value="'.$partenaire->id.'" selected >'.$partenaire->nom.'</option>';
                    $response['data'] = $data;
                    $response['status'] = 'saved';
                    $response['champtype'] = 'partenaire';
                    $response['message'] = '<div class="message success" onclick="this.classList.add(\'hidden\')">The partenaire has been saved.</div>';
                    echo json_encode($response);
                }
                else 
                {
                    //$this->Flash->error(__('The partenaire could not be saved. Please, try again.'));
                    $response['data'] = "";
                    $response['status'] = 'error';
                    $response['champtype'] = 'partenaire';
                    $response['message'] = '<div class="message success" onclick="this.classList.add(\'hidden\')">The partenaire could not be saved. Please, try again.</div>';
                    echo json_encode($response);
                }
            }
            else
            {
                $this->set(compact('partenaire'));
                $this->set('_serialize', ['partenaire']);
                $this->render('addpopup', 'ajax');
            }
        }
    }

}
