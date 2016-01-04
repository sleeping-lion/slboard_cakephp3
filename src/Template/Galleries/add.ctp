<?php $this->Html->addCrumb(__('Gallery'), array('controller' => 'galleries', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Gallery'), array('controller' => 'galleries', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Gallery')) ?>
<section id="sl_gallery_add">
<?php echo $this->Form->create('Gallery',array('type'=>'file')) ?>
<div class="form-group">
<?php echo $this->Form->input('gallery_category_id',array('type'=>'select','div'=>array('class'=>'form-group'),'class'=>'form-control','selected'=>$galleryCategoryId)) ?>
</div>
<div class="form-group">
<?php echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this->Form->input('content',array('div'=>array('class'=>'form-group'),'class'=>'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this->Form->input('photo', array('type' => 'file','div'=>array('class'=>'form-group'))) ?>
</div>
<div class="form-group">
<?php echo $this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?php echo $this -> Form -> end() ?>
</section>