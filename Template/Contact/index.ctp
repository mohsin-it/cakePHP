<?php $this->layout='client';?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 divmargin">
        <h1>Contact us</h1>
        <?= $this->Form->create($contact) ?>
        <?= $this->Form->control('name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Your Name','data-validation'=>'length required','data-validation-length'=>'min5')) ?>
        <?= $this->Form->control('email', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Your Email Id','data-validation'=>'email')) ?>
        <?= $this->Form->control('body', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Your Message')) ?>
        <br>
        <?= $this->Form->button('Submit', array('class' => 'btn btn-primary col-md-offset-5')) ?>
        <?= $this->Form->end() ?>    

    </div> 
</div>



    