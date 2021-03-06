<?php
namespace App\Controller;

/*
* Book Status
0. Available
1. Requested
2. Issued

* Request ownerAck field
0. Pending
1. Accepted
2. Declined
3. Cancelled
4. Issued
*/

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 */
class BooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->log("user_id = $user_id", 'debug');
        $this->paginate = [
            'contain' => ['Users']
            /*'conditions' => array(
                "Books.user_id = $user_id"
                //'Books.user_id = 1'
            )*/
            
        ];
        $books = $this->paginate($this->Books);
        

        $this->set(compact('books'));
        $this->set('_serialize', ['books']);
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Users', 'Reviews']
        ]);

        $this->set('book', $book);
        $this->set('_serialize', ['book']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $book = $this->Books->newEntity();
        $this->log($this->request->data, 'debug');
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->data);
            $book->set(array('user_id' => "$user_id", 'status' => '0'));
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The book could not be saved. Please, try again.'));
            }
        }
        $users = $this->Books->Users->find('list', ['limit' => 200]);
        $this->set(compact('book', 'users'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->data);
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The book could not be saved. Please, try again.'));
            }
        }
        $users = $this->Books->Users->find('list', ['limit' => 200]);
        $this->set(compact('book', 'users'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function borrow($id = null)
    {
        if($id == null)
            return $this->redirect(['action' => 'index']);
        //echo "1234";
        $book = $this->Books->get($id, [
            'contain' => ['Users', 'Reviews']
        ]);
    
        $this->set('book', $book);
        if($book->status == 1)
        {
            $this->Flash->error("Book is already borrowed");
            return $this->redirect(['action' => 'index']);
        }
        $this->set('_serialize', ['book']);
        
        //redirect if the book is already borrowed with an error
    }
    
    
    public function generateRequest($id = null)
    {
        /*
        1. Fetch current user id
        2. Fetch the book for which the request is to be generated.
        3. Fetch the user_id of the owner by the book result
        4. Fetch the no. of weeks
        5. Save all this info (load model for requests and then save)
        6. Give request-id to the user
        */
        
        
        //$this->request->allowMethod(['post', 'confirmBorrow']);
        $user_id = $this->request->session()->read('Auth.User.id');
        $book = $this->Books->get($id, [
            'contain' => ['Users', 'Reviews']
        ]);
        if($book->status == 0) // Status is 0 if book is available
        {    
            $owner_id = $book->user_id;
            $Weeks = $this->request->data['Weeks'];

            $this->loadModel('requests');
            $request = $this->requests->newEntity();
            $request->set(array(
                'book_id' => "$id",
                'borrower_id' => "$user_id",
                'owner_id' => "$owner_id",
                'Weeks' => "$Weeks",
                'ownerAck' => 0,
                'rentPaid' => 0
            ));

            if($this->requests->save($request))
            {    
                 $book = $this->Books->get($id, [
                'contain' => ['Users', 'Reviews']
                ]);
                $book->set(array('status' => '1'));
                $this->loadModel('Books');
                if($this->Books->save($book))
                { 
                    $this->Flash->success('Request successfully saved');
                    return $this->redirect(['controller' => 'requests', 'action' => 'index']);
                }
            }
            else
            {
                $this->Flash->error('Something went wrong!');
                return $this->redirect(['controller' => 'requests', 'action' => 'index']);
            }
        }    
    }
    
    
    public function myBooks($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->log("user_id = $user_id", 'debug');
        $this->paginate = [
            'contain' => ['Users'],
            //Show only the books added by the user by using condition
            'conditions' => array(
                "Books.user_id = $user_id"
                //'Books.user_id = 1'
            )];
        $books = $this->paginate($this->Books);
        

        $this->set(compact('books'));
        $this->set('title', 'My Books');
        $this->set('_serialize', ['books']);
    }
    
    public function searchbook()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->log("user_id = $user_id", 'debug');
        $this->paginate = [
            'contain' => ['Users'],
            //Show only the books added by the user by using condition
            'conditions' => array(
                "Books.user_id != $user_id",
                "Books.status = 0"
                //'Books.user_id = 1'
            )];
        $books = $this->paginate($this->Books);
        

        $this->set(compact('books'));
        $this->set('_serialize', ['books']);
    }
        
    
}
