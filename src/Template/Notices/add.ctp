<?php $this -> Html -> addCrumb(__('Notice'), array('controller' => 'notices', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Notice'), array('controller' => 'notices', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Notice')) ?>
<?php echo $this -> Form -> create('Notice'); ?>
<div class="form-group">
<?php echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control')); ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('NoticeContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control','id'=>'sl_content')); ?>
</div>
<div class="form-group">
<?php echo $this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?php echo $this -> Form -> end(); ?>