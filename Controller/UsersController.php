<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\ORM\Locator\TableLocator;


/**
 * CakePHP AdminController
 * @author MohSiN
 */
class UsersController extends AppController {
    var $helpers = array('Html', 'Form', 'Javascript');
  
    
//    public $components = array(
//        'Auth'=>array(
//            'authenticate'=>array(
//                'Form'=>array(
//                    'userModel'=>'Users',
//                    'fields'=>array(
//                        'username'=>'email',
//                        'password'=>'password'
//                    )
//                )
//            ),
//            'loginRedirect'=>array('controller'=>'Users','action'=>'index'),
//            //'logoutRedirect' => array('controller' => 'pages', 'action' => 'index'),
//            'loginAction' => array('controller' => 'users', 'action' => 'login'),
//            'sessionKey' => 'User'
//        )
//    );
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('admin');
    }
    public function initialize() {
        parent::initialize();
        //$this->Auth->allow(['logout']);
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //debug($this->request->params['controller']);
        
//        $user = $this->request->session()->read('Auth.Donor');
//        if (isloggedIn) {
//            return $this->redirect(['controller' => 'Donors', 'action' => 'login']);
//        }
        $this->Auth->allow(['login','logout','forgotpassword','reset']);
        //$this->Auth->deny();
    }
   

    public function index(){
   
       $adminc = TableRegistry::get('Users')->find('all');
       $adminc->select(['admin_id','count'=>$adminc->func()->count('*')]);
       $martyrc = TableRegistry::get('Martyrs')->find('all');
       $martyrc->select(['martyr_id', 'count' => $martyrc->func()->count('*')]);
       $donorc = TableRegistry::get('Donors')->find('all');
       $donorc->select(['donor_id', 'count' => $donorc->func()->count('*')]);
       $total = TableRegistry::get('DonationHistories')->find('all');
       $total->select(['t_id', 'amt' => $total->func()->sum('donation_amt')]);
        //pr($total);die;
        foreach ($total as $amount) {
            $this->set('donationamt', $amount->amt);
        }
        foreach($adminc as $user){
           $this->set('admincount',$user->count);
        }
        foreach ($martyrc as $martyr) {
            $this->set('martyrcount', $martyr->count);
        }
        foreach ($donorc as $donor) {
            $this->set('donorcount', $donor->count);
        }
        $this->loadModel('Donors');
        
        
        $user = $this->request->session()->read('Auth.User');
      
        $query = $this->Donors->find('all')->where(['registeredat >'=>$user['loggedinat']]);
        $this->set('donors', $query);
//        $this->set(compact('donors'));
//        $this->set('_serialize', ['donors']);
//        $this->set(compact('donors'));
//        $this->set('_serialize', ['donors']);
        
    }
    public function registeradmin() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                 $this->Users->updateAll(['createdat'=> time()], ['admin_id' => $user->admin_id]);


                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function displayadmin() {
       
         $this->set('users',$this->paginate($this->Users));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    public function updateadmin($id = null) {
        $check = $this->request->session()->read('Auth.User');
        if (($check['admin_id']) != $id) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The Data has been Updated,Please Login Again'));
                 $this->Users->updateAll(['updatedat'=> time()], ['admin_id' => $user['admin_id']]);

                return $this->redirect($this->Auth->logout());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function registermartyr() {
         $this->loadModel('Martyrs');
        $martyr =$this->Martyrs->newEntity();
        if ($this->request->is('post')) {
            $martyr = $this->Martyrs->patchEntity($martyr, $this->request->data, [
                'associated' => ['MartyrFamilies']
            ]);
                       
            $target_path = WWW_ROOT . 'img\martyr_dir' . DS . $this->request->data('martyr_img.name');

           // pr($target_path);exit;
            move_uploaded_file( $this->request->data['martyr_img']['tmp_name'] ,$target_path);
            //save the file name in the field 'url'
            $martyr->martyr_img = $this->request->data('martyr_img.name');
            //the script ends here
            if ($this->Martyrs->save($martyr)) {
                $this->Flash->success(__('The martyr has been saved.'));
                 $this->Martyrs->updateAll(['martyrat'=> time()], ['martyr_id' => $martyr->martyr_id]);


                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error(__('The martyr could not be saved. Please, try again.'));
            
        }
        $this->set(compact('martyr'));
        $this->set('_serialize', ['martyr']);
    }
    public function displaymartyrs() {
        $this->loadModel('Martyrs');
        
        //$this->set('martyrs', $this->paginate($this->Martyrs));
        $this->paginate = [
            'contain' => ['MartyrFamilies'],
            'limit'=>50,
        ];
        $martyrs = $this->paginate($this->Martyrs);
        $this->set(compact('martyrs'));
        $this->set('_serialize', ['martyrs']);
       
    }
    public function displaydonors(){
        $this->loadModel('Donors');
        $this->paginate = [
            'contain' => ['ContactDetails']
        ];
        $donors = $this->paginate($this->Donors);

        $this->set(compact('donors'));
        $this->set('_serialize', ['donors']);
    }

    public function login(){
       
        if ($this->Auth->user()) {
             return $this->redirect($this->Auth->redirectUrl()); 
        }
        if ($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                //pr($user['admin_id']);die;
                //$this->Users->updateAll(['loggedinat'=> time()], ['admin_id' => $user['admin_id']]);

                return $this->redirect($this->Auth->redirectUrl());   //$this->Auth->redirectUrl()
                             
            }//['controller' => 'Users','action' =>'index']
            $this->Flash->error('Your username or password is incorrect!');
        }
    }
    
     public function logout() {
         $user = $this->request->session()->read('Auth.User');
         $this->Users->updateAll(['loggedinat'=> time()], ['admin_id' => $user['admin_id']]);
        $this->request->session()->destroy();
         $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    public function forgotpassword() {
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['admin_id' => $user->admin_id])) {
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }
    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->transport('gmail');
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('patelmohsin6562@gmail.com');
        $email->to($user->email, $user->first_name);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->email]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }
     public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    // Clear passkey and timeout
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
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
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/users');
        }
    }

    public function setting($id = null) {
       $user = $this->request->session()->read('Auth.User');
        if(($user['admin_id']) != $id ){
            return $this->redirect($this->Auth->redirectUrl());
        }   

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

//    public function beforeFilter(Event $event){
//        $this->Auth->allow('martyrs');
//    }
    

    public function band($id = null){
        $user=$this->request->session()->read('Auth.User');
        if($user['admin_id']==$id){
           $this->Flash->error(__('You Can not Ban Loggedin User'));
            return $this->redirect(['action'=>'displayadmin']); 
        }
        $this->viewBuilder()->autoLayout(false);
        $query = $this->Users->query();
        $query->update()
                ->set(['isactive' => 0])
                ->where(['admin_id' => $id])
                ->execute();
        $this->Flash->success(__('The user has been deleted.'));
        return $this->redirect(['action'=>'displayadmin']);
    }
    public function delete($id = null) {
        $this->viewBuilder()->autoLayout(false);
        $this->loadModel('Martyrs');
        $query = $this->Martyrs->query();
        $query->update()
                ->set(['isactive' => 0])
                ->where(['martyr_id' => $id])
                ->execute();
        $this->Flash->success(__('The Martyr has been deleted.'));
        return $this->redirect(['action' => 'displaymartyrs']);
    }
    public function revert($id = null) {
        $this->viewBuilder()->autoLayout(false);
        $this->loadModel('Martyrs');
        $query = $this->Martyrs->query();
        $query->update()
                ->set(['isactive' => 1])
                ->where(['martyr_id' => $id])
                ->execute();
        $this->Flash->success(__('Access Granted.'));
        return $this->redirect(['action' => 'displaymartyrs']);
    }
    public function deleteDonor($id = null) {
        $this->viewBuilder()->autoLayout(false);
        $this->loadModel('Donors');
        $query = $this->Donors->query();
        $query->update()
                ->set(['isactive' => 0])
                ->where(['donor_id' => $id])
                ->execute();
        $this->Flash->success(__('The Donor has been deleted.'));
        return $this->redirect(['action' => 'displaydonors']);
    }

    public function revertDonor($id = null) {
        $this->viewBuilder()->autoLayout(false);
        $this->loadModel('Donors');
        $query = $this->Donors->query();
        $query->update()
                ->set(['isactive' => 1])
                ->where(['donor_id' => $id])
                ->execute();
        $this->Flash->success(__('Access Granted.'));
        return $this->redirect(['action' => 'displaydonors']);
    }
    public function about(){

    }

    public function isAuthorized($user = null) {
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
