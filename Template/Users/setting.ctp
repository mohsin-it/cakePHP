
<div class="span2 well">
    <blockquote>
        <p><i class="fa fa-user-circle"></i> <?= h($user->screen_name) ?> <?= $this->Html->link(__(''), ['action' => 'updateadmin', $user->admin_id],array('class' => 'fa fa-edit', 'aria-hidden' => 'true')) ?></p>
        <small><cite title="Source Title">Admin </cite></small>
    </blockquote>
    <p>
        <i class="fa fa-envelope"></i> <?= h($user->email) ?> <br>
        <i class="fa">Registered At</i>  <?= date("d-M-Y H:i", strtotime($user->createdat)) ?>
    </p>
    
<!--    <div id="wrap" class="text-center">
         Button trigger modal 
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Change Password
        </button>
    </div>-->

    <!-- Modal -->
    <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" >
        <!--<div class="container">-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    
                    <div class="col-md-6 col-md-offset-3 login-panel panel panel-default centered">
                        <div  class="panel-heading ">
                            <center>Change Password <button type="button" class="close" data-dismiss="modal" aria-label="Close"><li class="fa fa-close"></li></button></center>
                        </div>
                        <div class="panel-body">
                            <?= $this->Form->create('', array('id' => 'myForm')); ?>
                            <?= $this->Form->input('old_password', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Old Password')); ?> 
                            <?= $this->Form->input('password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'New Password')); ?> 
                            <?= $this->Form->input('conf_password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Confirm Password')); ?> 
                            <br>
                            <?= $this->Form->submit('Register', array('class' => 'button btn btn-primary')); ?> 

                            <?= $this->Form->end(); ?>

                        </div>

                    </div> 

                </div>
            </div>
        <!--</div>-->
    </div>
    
</div>


