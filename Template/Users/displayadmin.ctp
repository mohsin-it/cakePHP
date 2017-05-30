<?php $user = $this->request->session()->read('Auth.User'); ?>
<br>
<div class="row">
<div class="col-md-10 col-md-offset-1 ">
    <div class="panel panel-default">
        <div class="panel-heading">Admin <span style="float: right"><?= $this->Html->link(__(' '), ['controller' => 'users', 'action' => 'registeradmin'], array('class' => 'fa fa-plus fa-lg', 'aria-hidden' => 'true')) ?></span></div>
        
        <div class="panel-body">
            <table cellpadding="0" cellspacing="0" class="table table-responsive">
                <thead>
                    <tr>
                        
                        <th scope="col"><?= $this->Paginator->sort('Screen Name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Username') ?></th>
                         
                        <th scope="col"><?= $this->Paginator->sort('createdat') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('updatedat') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('loggedinat') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($users as $user): ?>
                    <?php if($user->isactive==1){
                        $status="Active";
                    } 
                    else{
                       $status="In Active"; 
                    }
                    ?>
                   
                        <tr>
                            
                            <td><?= h($user->screen_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= date("d-M-Y H:i", strtotime($user->createdat)) ?></td>
                            <td><?= date("d-M-Y H:i", strtotime($user->updatedat) )?></td>
                            <td><?= date("d-M-Y H:i", strtotime($user->loggedinat)) ?></td>
                            <td><?= $status ?></td>
                            <td class="actions">
                               <!--$this->Html->link(__(''), ['action' => 'view', $user->admin_id],array('class' => 'fa fa-plus fa-lg', 'aria-hidden' => 'true'))--> 
                                <!--$this->Html->link(__(''), ['action' => 'updateadmin', $user->admin_id],array('class' => 'fa fa-edit', 'aria-hidden' => 'true')) ?>-->
                             <?php if($status=="In Active" ):?>
                                <span><?= $this->Form->postLink(__(''), ['action' => '', $user->admin_id], array('class' => 'btn  disabled fa fa-ban fa-lg', 'aria-hidden' => 'true'),['confirm' => __('Are you sure you want to delete # {0}?', $user->admin_id)]) ?></span>
                            <?php else:?>
                                <span><?= $this->Form->postLink(__(''), ['action' => 'band', $user->admin_id], array('class' => ' btn fa fa-trash-o fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $user->admin_id)]) ?></span>
                            <?php endif;?>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1 paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
</div>
<script>
    $('.my-link').bind('click', false);
    $('.my-link').unbind('click', false);
 </script>

    
     
