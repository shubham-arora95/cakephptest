<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books', 'Borrowers', 'Owners']
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
        $this->set('_serialize', ['requests']);
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Books', 'Borrowers', 'Owners']
        ]);

        $this->set('request', $request);
        $this->set('_serialize', ['request']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->data);
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));
            }
        }
        $books = $this->Requests->Books->find('list', ['limit' => 200]);
        $borrowers = $this->Requests->Borrowers->find('list', ['limit' => 200]);
        $owners = $this->Requests->owners->find('list', ['limit' => 200]);
        $this->set(compact('request', 'books', 'borrowers', 'owners'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->data);
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));
            }
        }
        $books = $this->Requests->Books->find('list', ['limit' => 200]);
        $borrowers = $this->Requests->Borrowers->find('list', ['limit' => 200]);
        $owners = $this->Requests->owners->find('list', ['limit' => 200]);
        $this->set(compact('request', 'books', 'borrowers', 'owners'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function myIssueRequests()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->paginate = [
            'contain' => ['Books', 'Borrowers', 'Owners'],
            'conditions' => array(
                "Requests.owner_id = $user_id",
                'Requests.ownerAck = 0'
            )
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
        $this->set('_serialize', ['requests']);
    }
    
    public function acceptIssueRequest($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if($request->owner_id == $user_id)
        {
            $request->set(array('ownerAck' => '1'));
            if($this->Requests->save($request))
                $this->Flash->success(__('Request has been accepted successfully'));
            else
                $this->Flash->error(__('Something went wrong.'));
        }
        else
        {
            $this->Flash->error(__('Something went wrong.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
    
    public function declineIssueRequest($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if($request->owner_id == $user_id)
        {
            $request->set(array('ownerAck' => '3'));
            if($this->Requests->save($request))
                $this->Flash->success(__('Request has been declined successfully'));
            else
                $this->Flash->error(__('Something went wrong.'));
        }
        else
        {
            $this->Flash->error(__('Something went wrong.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
}
