<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class HomeController extends AppController
{
    public function index()
    {
        $this->loadModel('Books');
        $user_id = $this->request->session()->read('Auth.User.id');
        //$this->log("user_id = $user_id", 'debug');
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
    
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow('index');
    }
}

?>