
<div class="row col-md-4 col-md-offset-4 divmargin">
    <div class="login-panel panel panel-default">
        <div class="panel-heading"><h3>Reset Password</h3></div>
        <div class="panel-body">
            <h4>Enter Your Email Id</h4>
            <?= $this->Form->create(); ?>
            <?= $this->Form->input('email', array('autofocus' => true, 'id' => 'email', 'label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'somebody@example.com', 'data-validation' => 'email')); ?> 
            <br>
            <?= $this->Form->submit('Request Reset', array('class' => 'button btn btn-primary btn-lg btn-block')); ?> <br>
            
            <?= $this->Form->end(); ?>

        </div>
    </div>    
</div>
