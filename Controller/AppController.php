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

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
            
   }
    public function initialize()
    {
        parent::initialize();
      
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
     if($this->request->params['controller']=='Users'){
        $this->loadComponent('Auth', [
            'authorize'=>['Controller'],
            'storage'=>['className'=>'Session','key'=>'Auth.User'],
            'authenticate' => [
                'Form' => [
                    'userModel'=>'Users',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'scope' => array('Users.isactive' => 1)
                ]
            ],
             'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
        ]);
        }else {
            $this->loadComponent('Auth', [
                'authorize' => ['Controller'],
                'storage' => ['className' => 'Session', 'key' => 'Auth.Donor'],
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'Donors',
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ],
                        'scope' => array('Donors.isactive' => 1)
                    ]
                ],
//                'loginRedirect' => [
//                    'controller' => 'Donors',
//                    'action' => 'index'
//                ],
                'logouRedirect' => [
                    'controller' => 'Donors',
                    'action' => 'login'
                ],
            ]);
        }
    }
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        // Login Check
        if ($this->request->session()->read('Auth.User')) {
            $this->set('loggedIn', true);
            
        } else {
            $this->set('loggedIn', false);
        }
        if ($this->request->session()->read('Auth.Donor')) {
            $this->set('donorloggedIn', true);
        } else {
            $this->set('donorloggedIn', false);
        }
    }

}
