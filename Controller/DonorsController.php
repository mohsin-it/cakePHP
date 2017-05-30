<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\I18n\Time;




//use Cake\ORM\TableRegistry;

/**
 * Donors Controller
 *
 * @property \App\Model\Table\DonorsTable $Donors
 */
class DonorsController extends AppController
{
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('client');
    }

    public function initialize() {
        parent::initialize();
       
    }
    public function afterLogin() {
        
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
//       $donor= $this->request->session()->read('Auth.Donor');
//        if ($donor) {
//            return $this->redirect(['controller'=>'Donors','action'=>'index']);
//            
//        } 
        
       // $this->Auth->sessionkey ='Auth.Donor';
       // pr($this->Auth->sessionkey);exit;
        $this->Auth->allow(['login','register','logout','forgotpassword','reset']);
        //$this->Auth->deny();
    }
    

    public function index()
    {
//        $time = new Time($this->Auth->user('date_of_birth'));
//        if ($time->isToday()) {
//            // Greet user with a happy birthday message
//            $this->Flash->success('Happy birthday to you...');
//        }
        $check = $this->request->session()->read('Auth.Donor');
        $donor = $this->Donors->get($check['donor_id'], [
            'contain' => ['ContactDetails']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
             
            $donor = $this->Donors->patchEntity($donor, $this->request->getData());
            if ($this->Donors->save($donor)) {
                $this->Donors->updateAll(['updatedat' => time()], ['donor_id' => $donor->donor_id]);
                $this->Flash->success(__('The Data has been Updated,Please Login Again'));
                $this->Auth->logout();
                return $this->redirect(['controller' => 'donors','action' =>'login']);   //$this->Auth->redirectUrl()
                           
            }
            $this->Flash->error(__('The donor could not be saved. Please, try again.'));
        }
        $this->set(compact('donor', 'donors'));
        $this->set('_serialize', ['donor']);
    }

    public function login(){
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $donor = $this->Auth->identify();
            if ($donor) {
                $this->Auth->setUser($donor);
                 $this->Donors->updateAll(['loggedinat' => time()], ['donor_id' => $donor['donor_id']]);
                 
                return $this->redirect($this->referer());   //$this->Auth->redirectUrl()
                //return $this->redirect(['controller' => 'martyrs','action' =>'index']);   //$this->Auth->redirectUrl()
            }//['controller' => 'Users','action' =>'index']
            $this->Flash->error('Your username or password is incorrect!');
        }
    }
    public function forgotpassword() {
        if ($this->request->is('post')) {
            $query = $this->Donors->findByEmail($this->request->data['email']);
            $donor = $query->first();
            if (is_null($donor)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'donors', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                if ($this->Donors->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['donor_id' => $donor->donor_id])) {
                    $this->sendResetEmail($url, $donor);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $donor) {
        $email = new Email();
        $email->transport('gmail');
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('patelmohsin6562@gmail.com');
        $email->to($donor->email, $donor->first_name);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $donor->email]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Donors->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $donor = $query->first();
            if ($donor) {
                if (!empty($this->request->data)) {
                    // Clear passkey and timeout
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $donor = $this->Donors->patchEntity($donor, $this->request->data);
                    if ($this->Donors->save($donor)) {
                        $this->Flash->success('Your password has been updated.');
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'forgotpassword']);
            }
            unset($donor->password);
            $this->set(compact('donors'));
        } else {
            $this->redirect('/');
        }
    }

    public function register() {
        $donor = $this->Donors->newEntity();
        if ($this->request->is('post')) {
            $donor = $this->Donors->patchEntity($donor, $this->request->data);
           //pr($donor);exit;
            if ($this->Donors->save($donor)) {
                $this->Flash->success('The user has been saved.');
                $this->Donors->updateAll(['registeredat' => time()], ['donor_id' => $donor->donor_id]);
                //Verification Code here
                return $this->redirect(['controller'=>'donors','action' => 'login']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('donor'));
        $this->set('_serialize', ['donor']);
    }

    public function logout() {
         $this->request->session()->destroy();
        //$this->Flash->success('You are now logged out.');
        $this->Auth->logout();
        //return $this->redirect($this->Auth->logout());
        return $this->redirect(['controller' => 'martyrs','action' =>'index']); 
    }
    public function isAuthorized($donor= null) {
//        // Any registered user can access public functions
////        if (!$this->request->getParam('prefix')) {
////            return true;
////        }
//
//        // Only admins can access admin functions
////        if ($this->request->getParam('prefix') === 'user') {
////            return (bool) ($user['admin_id'] === 'admin');
////        }
//
//        // Default deny
        return true;
        }
    }
