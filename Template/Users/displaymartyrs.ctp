<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
       <div class="panel-heading">Martyrs <span style="float: right"><?= $this->Html->link(__(' '), ['controller' => 'users', 'action' => 'registermartyr'], array('class' => 'fa fa-plus fa-lg', 'aria-hidden' => 'true')) ?></span> </div>
       <div class="panel-body">
           <table cellpadding="0" cellspacing="0" >
               <thead>
                   <tr>

                       
                       <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('About') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                       <th scope="col" class="actions"><?= __('Actions') ?></th>
                       
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($martyrs as $martyr): ?>
                    <?php if($martyr->isactive==1){
                        $status="Active";
                    } 
                    else{
                       $status="In Active"; 
                    }
                    ?>
                       <tr>

                          
                           <td><?= h($martyr->salutation) ?> </td>
                           <td><?= h($martyr->first_name) ?></td>
                           <td><?= h($martyr->detail) ?><br><?= date("d-M-Y H:i", strtotime($martyr->martyrat)) ?></td>
                           <td><?= $status ?></td>
                           <td class="actions">
                               <!--$this->Html->link(__(''), ['action' => 'view', $user->admin_id],array('class' => 'fa fa-plus fa-lg', 'aria-hidden' => 'true'))--> 
                                <!--$this->Html->link(__(''), ['action' => 'updateadmin', $user->admin_id],array('class' => 'fa fa-edit', 'aria-hidden' => 'true')) ?>-->
                            <?php if($status=="In Active"):?>
                                <span><?= $this->Form->postLink(__(''), ['action' => '', $martyr->martyr_id], array('class' => 'btn  disabled fa fa-trash-o fa-lg', 'aria-hidden' => 'true'),['confirm' => __('Are you sure you want to delete # {0}?', $martyr->martyr_id)]) ?></span>
                                <span><?= $this->Form->postLink(__(''), ['action' => 'revert', $martyr->martyr_id], array('class' => 'btn   fa fa-check fa-lg', 'aria-hidden' => 'true'),['confirm' => __('Are you sure you want to delete # {0}?', $martyr->martyr_id)]) ?></span>
                            <?php else:?>
                                <span><?= $this->Form->postLink(__(''), ['action' => 'delete', $martyr->martyr_id], array('class' => ' btn fa fa-trash-o fa-lg', 'aria-hidden' => 'true'), ['confirm' => 'Are you sure you want to delete?']) ?></span>
                                <span><?= $this->Form->postLink(__(''), ['action' => '', $martyr->martyr_id], array('class' => ' btn disabled fa fa-check fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $martyr->martyr_id)]) ?></span>
                            <?php endif;?>
                            </td>
   
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
                  </div>
        </div>
 
</div>
  
     






