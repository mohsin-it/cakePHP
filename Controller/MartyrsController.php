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
use Cake\Routing\Router;

/**
 * CakePHP AdminController
 * @author MohSiN
 */
class MartyrsController extends AppController {
    
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('client');
    }

    public function initialize() {
        parent::initialize();
        //$this->Auth->allow(['index','profile']);
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
       
        $this->Auth->allow();
    }
    
    public function index(){
        
        $this->paginate = [
            'contain' => ['MartyrFamilies','DonationHistories']
        ];
        $query = $this->Martyrs->find('all')->where(['isactive'=>1]);
        
        $this->set('martyrs', $this->paginate($query));
        $this->set(compact('martyrs'));
        $this->set('_serialize', ['martyrs']);
//        $total = TableRegistry::get('DonationHistories')->find('all')->where(['martyr_id'=>$this->martyr_id]);
//        $total->select(['t_id', 'amt' => $total->func()->sum('donation_amt')]);
//        //pr($total);die;
//        foreach ($total as $amount) {
//            $this->set('donationamt', $amount->amt);
//        }
    }
    public function profile($id=null){  //add $id = null
        $martyr = $this->Martyrs->get($id, [
            'contain' => ['MartyrFamilies']
        ]);

        $this->set('martyr', $martyr);
        $this->set('_serialize', ['martyr']);
        $total = TableRegistry::get('DonationHistories')->find('all')->where(['martyr_id' => $id]);
        $total->select(['t_id', 'amt' => $total->func()->sum('donation_amt')]);
        $this->set('m_id',$id);
        //pr($total);die;
        foreach ($total as $amount) {
            $this->set('donationamt', $amount->amt);
            $per = ($amount->amt *100)/1000000;
            $this->set('per',$per);
            //pr($per);die;
            
        }
     
    }
    public function about(){
        $this->loadModel('Pages');
        
        $this->set('pages', $this->paginate($this->Pages));
        $this->set(compact('pages'));
        $this->set('_serialize', ['pages']);
    }
    public function blog(){
        
    }
  public function pay()
    {
      $donor = $this->request->session()->read('Auth.Donor');
      if(!$donor){
          $this->Flash->error("Plese login to donate");
          return $this->redirect(['controller'=>'donors','action'=>'login']);
      }
    }
    

}
