<div class="row">
    <div class="col-md-4">
     <?= $this->Html->image('error.jpg',array('class'=>'img-responsive'))?>   
    </div>
    <div class="col-md-8">
        <?php foreach($pages as $page):?>
        <?= h($page->body)?>
        <?php endforeach;?>
    </div>
</div>

