<div class="row">
    <?= $this->Form->create()?>
   <?= $this->Form->input('body',array('label'=>'','type'=>'textarea','class'=>'ckeditor'))?> 
   <?= $this->Form->submit('Submit')?>
    <?= $this->Form->end()?>
</div>

