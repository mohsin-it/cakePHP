<?php

$this->layout = 'login';
 
?>
<div class="login-panel panel panel-default animated flipInX">
    <div class="panel-heading"><h3>Admin</h3></div>
    <div class="panel-body">
        <h4>Log in with your email account</h4>
        <?= $this->Form->create(''); ?>
        <?= $this->Form->input('email', array('id' => 'email', 'label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'somebody@example.com','data-validation'=>'email')); ?> 
        <?= $this->Form->input('password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Password','data-validation'=>'strength','data-validation-strength'=>'1')); ?> 
        
        <br>
        <?= $this->Form->submit('Login', array('class' => 'button btn btn-primary btn-lg btn-block')); ?> <br>
        <div>
            <label>
                <center><?= $this->Html->link('Forgot Password?', ['controller' => 'users', 'action' => 'forgotpassword']); ?></center> 
            </label>
        </div>
        <?= $this->Form->end(); ?>
       
    </div>
</div>

<script type="text/javascript">
function showPassword() {
    
    var key_attr = $('#key').attr('type');
    
    if(key_attr !== 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}
</script>      
