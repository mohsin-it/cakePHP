<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use App\Form\ContactForm;



/**
 * CakePHP ContactController
 * @author MohSiN
 */
class ContactController extends AppController {
   
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function index(){
        $contact = new ContactForm();
        
        if($this->request->is('post')){
            if($contact->execute($this->request->getData())){
                if ($contact->execute($this->request->data)) {
                    $this->request->data = [];
                }
                $this->Flash->success("Thank You! We Will get back to you soon.");
            }else{
                 $this->Flash->error("There was a problem submitting your form.");
            }
        }
        $this->set('contact',$contact);
    }
   

}
