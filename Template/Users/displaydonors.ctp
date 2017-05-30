<div class=" col-md-10 col-md-offset-1 panel panel-body">
    <h3><?= __('Donors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pan_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registeredat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donors as $donor): ?>
            <?php if($donor->isactive==1){
                        $status="Active";
                    } 
                    else{
                       $status="In Active"; 
                    }
                    ?>

            <tr>
                <td><?= h($donor->salutation).' '.h($donor->first_name).' '.h($donor->last_name)  ?></td>
                <td><?= h($donor->email) ?></td>
                <td><?= h($donor->date_of_birth) ?></td>
                <td><?= h($donor->pan_no) ?></td>
                <td><?= date("d-M-Y H:i", strtotime($donor->registeredat)) ?></td>
                <td><?= $status ?></td>
                <td class="actions">
                    <?php if($status=="In Active"):?>
                        <span><?= $this->Form->postLink(__(''), ['action' => '', $donor->donor_id], array('class' => 'btn  disabled fa fa-trash-o fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $donor->donor_id)]) ?></span>
                        <span><?= $this->Form->postLink(__(''), ['action' => 'revertDonor', $donor->donor_id], array('class' => 'btn   fa fa-check fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $donor->donor_id)]) ?></span>
                    <?php else: ?>
                        <span><?= $this->Form->postLink(__(''), ['action' => 'deleteDonor', $donor->donor_id], array('class' => ' btn fa fa-trash-o fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $donor->donor_id)]) ?></span>
                        <span><?= $this->Form->postLink(__(''), ['action' => '', $donor->donor_id], array('class' => ' btn disabled fa fa-check fa-lg', 'aria-hidden' => 'true'), ['confirm' => __('Are you sure you want to delete # {0}?', $donor->donor_id)]) ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
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

