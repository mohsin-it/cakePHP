<br>

<div class="col-md-6 col-md-offset-3 login-panel panel panel-default centered">
    <div  class="panel-heading ">
        <center>Admin Registration</center>
    </div>
    <div class="panel-body">
        <?= $this->Form->create(''); ?>
        <?= $this->Form->input('screen_name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Screen Name','data-validation'=>'length required','data-validation-length'=>'min3')); ?> 
        <?= $this->Form->input('email', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Email','data-validation'=>'email')); ?> 
        <?= $this->Form->input('password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Password','data-validation'=>'length','data-validation-length'=>'min8')); ?> 
        <?= $this->Form->input('conf_password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Confirm Password','data-validation'=>'confirmation','data-validation-confirm'=>'password')); ?> 
        <hr>
        <fieldset>
            <div class="col-md-6"><?= $this->Form->submit('Register', array('class' => 'button btn btn-primary')); ?> </div>
            <div class="col-md-6"><?= $this->Form->reset('Cancel', array('type' => 'reset', 'class' => 'button btn btn-danger')); ?> </div>

        </fieldset>
        <?= $this->Form->end(); ?>

    </div>
    
</div> 

       
    
   



