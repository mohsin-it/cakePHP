<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DonationHistories Controller
 *
 * @property \App\Model\Table\DonationHistoriesTable $DonationHistories
 */
class DonationHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Ts', 'Donors', 'Martyrs']
//        ];
//        $donationHistories = $this->paginate($this->DonationHistories);
//
//        $this->set(compact('donationHistories'));
//        $this->set('_serialize', ['donationHistories']);
    }

   
}
