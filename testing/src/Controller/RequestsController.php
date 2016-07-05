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
        $book_id = $request->book_id;
        if($request->owner_id == $user_id)
        {
            $request->set(array('ownerAck' => '2'));
            if($this->Requests->save($request))
            {
                $this->loadModel('Books');
                $book = $this->Books->get($book_id);
                $book->set(array('status' => '0'));
                if($this->Books->save($book))
                {
                   $this->Flash->success(__('Request has been declined successfully')); 
                }
            }
            else
                $this->Flash->error(__('Something went wrong request was not saved.'));
        }
        else
        {
            $this->Flash->error(__('Something went wrong.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
    
    /* Function myBorrowRequests */
    
    public function myBorrowRequests()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->paginate = [
            'contain' => ['Books', 'Borrowers', 'Owners'],
            'conditions' => array(
                "Requests.borrower_id = $user_id",
                /*'Requests.ownerAck = 0'*/
            )
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
        $this->set('_serialize', ['requests']);
    }
    
    public function cancelIssueRequest($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        $book_id = $request->book_id;
        if($request->borrower_id == $user_id)
        {
            $request->set(array('ownerAck' => '3'));
            if($this->Requests->save($request))
            {
                $this->loadModel('Books');
                $book = $this->Books->get($book_id);
                $book->set(array('status' => '0'));
                if($this->Books->save($book))
                {
                   $this->Flash->success(__('Request has been canceled successfully')); 
                }
            }
            else
                $this->Flash->error(__('Something went wrong request was not saved.'));
        }
        else
        {
            $this->Flash->error(__('Something went wrong.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
    
    public function payRent($id = null)
    {
        /*
        * 1. Add status to rentpaid = 1;
        * 2. Add book status to issued
        * 3. Add a new transaction
        */ 
    }
}
