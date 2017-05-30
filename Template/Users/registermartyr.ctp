<br>
<div class="col-md-6 col-md-offset-3 login-panel panel panel-default centered">
    <div  class="panel-heading ">
        <center>Martyr Registration</center>
    </div>
    <div class="panel-body">
        <fieldset>
        <?= $this->Form->create($martyr,['enctype'=>'multipart/form-data']); ?>
        <?= $this->Form->input('salutation', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Salutation' ,'data-validation'=>'length required','data-validation-length'=>'2-12')); ?> 
        <?= $this->Form->input('first_name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'First Name','data-validation'=>'length required','data-validation-length'=>'min3')); ?> 
        <?= $this->Form->input('middle_name', array('label' => '',  'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Middle Name')); ?> 
        <?= $this->Form->input('last_name', array('label' => '',  'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Last Name','data-validation'=>'length required','data-validation-length'=>'min3')); ?> 
        
        <?= $this->Form->input('date_of_birth', array('label' => '','type'=>'text',  'div' => 'form-group','id'=>'datepicker','title'=>'Date is in dd/mm/yyyy format','class' => 'form-control', 'placeholder' => 'DOB','data-validation'=>'date required','data-validation-format'=>'dd/mm/yyyy')); ?> 
        <?= $this->Form->input('martyr_img', array('label' => '','type'=>'file' , 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Upload Photo','data-validation'=>'size','data-validation' => 'required')); ?> 
        <?= $this->Form->input('detail', array('label' => '','type'=>'textarea' , 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Enter Description','data-validation'=>'length required','data-validation-length'=>'min10')); ?> 
        <?= $this->Form->input('ac_no', array('label' => '','type'=>'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Bank AC No','data-validation'=>'length required number','data-validation-length'=>'min16')); ?> 
            <hr>
        <?= $this->Form->input('martyr_family.no_of_members', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Total Family Members', 'data-validation' => 'required')); ?> 
        <?= $this->Form->input('martyr_family.income', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Yearly Income', 'data-validation' => 'required')); ?> 
        
        </fieldset>
        <hr>
        <fieldset>
            <div class="col-md-6"><?= $this->Form->submit('Register', array('class' => 'button btn btn-primary')); ?> </div>
            <div class="col-md-6"><?= $this->Form->reset('Cancel', array('type' => 'reset','class' => 'button btn btn-danger')); ?> </div>
        
        </fieldset>
        

        <?= $this->Form->end(); ?>

    </div>
    
</div> 

<script>
    
    $( function() {
    $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:current',
            dateFormat: 'dd/mm/yy'
    });
  } );
  $( function() {
    $( document ).tooltip();
    
  } );
  $.validate({
  modules : 'file'
});
</script>

      
   



