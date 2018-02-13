<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts */
class ContactsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Partenaires']
        ];
        $contacts = $this->paginate($this->Contacts);

        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Partenaires']
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $partenaires = $this->Contacts->Partenaires->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'partenaires'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $partenaires = $this->Contacts->Partenaires->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'partenaires'));
        $this->set('_serialize', ['contact']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addpopup()
    {
        $contact = $this->Contacts->newEntity();
        $this->autoRender = false;
        if($this->request->is('ajax'))
        {
            if ($this->request->is('post'))
            {
                $contact= $this->Contacts->patchEntity($contact, $this->request->getData());
                if ($this->Contacts->save($contact))
                {
                    //$this->Flash->success(__('The contacthas been saved.'));
                    $data = '<option value="'.$contact->id.'" selected >'.$contact->nom.'</option>';
                    $response['data'] = $data;
                    $response['status'] = 'saved';
                    $response['champtype'] = 'contact';
                    $response['message'] = '<div class="message success" onclick="this.classList.add(\'hidden\')">The contact has been saved.</div>';
                    echo json_encode($response);
                }
                else 
                {
                    //$this->Flash->error(__('The contactcould not be saved. Please, try again.'));
                    $response['data'] = "";
                    $response['status'] = 'error';
                    $response['champtype'] = 'contact';
                    $response['message'] = '<div class="message success couldnot" onclick="this.classList.add(\'hidden\')">The contact could not be saved. Please, try again.</div>';
                    echo json_encode($response);
                }
            }
            else
            {
                $partenaires = $this->Contacts->Partenaires->find('list');
                $this->set(compact('contact', 'partenaires'));
                $this->set('_serialize', ['contact']);
                $this->render('addpopup', 'ajax');
            }
        }
    }
 

}
