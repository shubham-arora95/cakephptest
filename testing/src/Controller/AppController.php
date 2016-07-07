<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadcomponent('Auth',[
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' =>'Users',
                'action' => 'login'
            ]
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        //Login Check
        if($this->request->session()->read('Auth.User'))
        {
            $this->set('loggedIn', true);
        }
        else
            $this->set('loggedIn', false);
        
        // Creating a conn object for transactions
        $conn = ConnectionManager::get('default');
        
        
        //$menus = $this->paginate($this->Menus);
        /*
        *To crate a menu do:
        *   1. Load the model of the class with $this->loadModel('model-name); method
        *   2.create a object with a resultset of all the menu item 
        */
        $this->loadModel('Menus');
        $menus = $this->Menus->find('all', ['order' => ['place' => 'ASC']]);
        $this->set('menus', $menus);
        $this->set('_serialize', ['menu']);
        $now = Time::now();
        $now->i18nFormat(null, 'Europe/Paris');
    
    }
    
    
}
