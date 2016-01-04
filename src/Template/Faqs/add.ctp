<?php $this -> Html -> addCrumb(__('Faq'), array('controller' => 'faqs', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Faq'), array('controller' => 'faqs', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Faq')) ?>
<?php echo $this -> Form -> create('Faq') ?>
<div class="form-group">
<?php echo $this -> Form -> input('faq_category_id', array('type' => 'select', 'class' => 'form-control','selected'=>$faqCategoryId)); ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('title', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('FaqContent.content', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
<?=$this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?=$this -> Form -> end(); ?>