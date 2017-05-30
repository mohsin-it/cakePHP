<?php $this->layout = 'login';?>
<div class="login-panel panel panel-default animated flipInX">
    <div class="panel-heading"><h3>Reset Your Password</h3></div>
    <div class="panel-body">
        <h4>Enter Password</h4>
        <?= $this->Form->create(''); ?>
        <?= $this->Form->input('password', array('autofocus'=>true,'label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Password', 'data-validation' => 'length', 'data-validation-length' => 'min8')); ?> 
        <?= $this->Form->input('conf_password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'data-validation' => 'confirmation', 'data-validation-confirm' => 'password')); ?> 

        <br>
        <?= $this->Form->submit('Reset', array('class' => 'button btn btn-primary btn-lg btn-block')); ?> <br>
       
        <?= $this->Form->end(); ?>

    </div>
</div>