
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> Update Details </strong>
            </div>
            <br> 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create($donor) ?>
                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?= $this->Form->input('salutation',array('empty' => 'Salutation', 'label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Salutation', 'data-validation' => 'required')); ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?= $this->Form->input('first_name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'First Name', 'data-validation' => 'length required', 'data-validation-length' => 'min3')); ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?= $this->Form->input('middle_name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Middle Name')); ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?= $this->Form->input('last_name', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Last Name', 'data-validation' => 'length required', 'data-validation-length' => 'min3')); ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?= $this->Form->input('email', array('label' => '', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Email', 'data-validation' => 'email')); ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <?= $this->Form->input('password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Password', 'data-validation' => 'length', 'data-validation-length' => 'min8')); ?> 

                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <?= $this->Form->input('conf_password', array('label' => '', 'type' => 'password', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'data-validation' => 'confirmation', 'data-validation-confirm' => 'password')); ?> 

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-birthday-cake"></i>
                                    </span>
                                    <?= $this->Form->input('date_of_birth', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'id' => 'datepicker', 'title' => 'Date is in dd/mm/yyyy format', 'class' => 'form-control', 'placeholder' => 'DOB', 'data-validation' => 'date required', 'data-validation-format' => 'dd/mm/yyyy')); ?> 

                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                    <?= $this->Form->input('pan_no', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'PAN No', 'data-validation' => 'length required', 'data-validation-length' => '10-10')); ?> 

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-mobile"></i>
                                </span>
                                <?= $this->Form->input('contact_detail.phone_no', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Contact No', 'data-validation' => 'length required number', 'data-validation-length' => 'min10')); ?> 

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </span>
                                <?= $this->Form->input('contact_detail.street1', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Address Line 1', 'data-validation' => 'length required', 'data-validation-length' => 'min5')); ?> 

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </span>
                                <?= $this->Form->input('contact_detail.street2', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Address Line 2', 'data-validation' => 'required')); ?> 

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                    <?= $this->Form->input('contact_detail.city', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'City', 'data-validation' => 'length required', 'data-validation-length' => 'min3')); ?> 

                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                    <?= $this->Form->input('contact_detail.pin_code', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Postal Code ', 'data-validation' => 'length required', 'data-validation-length' => 'min6')); ?> 

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                    <?= $this->Form->input('contact_detail.state', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'State', 'data-validation' => 'length required', 'data-validation-length' => 'min6')); ?> 

                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                    <?= $this->Form->input('contact_detail.country', array('label' => '', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control', 'placeholder' => 'Country', 'data-validation' => 'length required', 'data-validation-length' => 'min5')); ?> 

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-8 col-md-offset-3">
                            <div class="col-md-6"><?= $this->Form->submit('Register', array('class' => 'button btn btn-primary')); ?> </div>
                            <div class="col-md-6"><?= $this->Form->reset('Cancel', array('type' => 'reset', 'class' => 'button btn btn-danger')); ?> </div>
                        </div>

                        <?= $this->Form->end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(function () {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:current',
            dateFormat: 'dd/mm/yy'
        });
    });
    $(function () {
        $(document).tooltip();

    });
</script>

