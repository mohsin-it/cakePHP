<div class="row">
    <div class="col-md-4 col-md-offset-4  divmargin">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> Sign in </strong>
            </div>
            <br>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12"> 
                <?= $this->Form->create('Donors') ?>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?= $this->Form->input('email', array('id' => 'email', 'label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'somebody@example.com', 'data-validation' => 'email')); ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                             <?= $this->Form->input('password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Password', 'data-validation' => 'strength', 'data-validation-strength' => '1')); ?>  
                        </div>
                    </div>
                    <br>
                   <?= $this->Form->submit('Log In', array('class' => 'button btn btn-primary btn-lg btn-block')); ?> <br>
                
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                </div>
               
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <?= $this->Html->link('Forgot Password?', ['controller' => 'donors', 'action' => 'forgotpassword']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
            <div class="panel-footer ">
                Don't have an account! <?= $this->Html->link(_('Register Here'),array('controller'=>'donors','action'=>'register')) ?>
            </div>
        </div>
    </div>
</div>



