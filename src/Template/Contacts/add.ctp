<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'contacts', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Contact')) ?>
<section id="sl_contact_add">
<?php echo $this -> Form -> create('Contact'); ?>
<div class="form-group">
<?php echo $this -> Form -> input('name', array('class' => 'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('email', array('type'=>'email', 'class' => 'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('phone', array('class' => 'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('title', array('class' => 'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this -> Form -> input('ContactContent.content', array('class' => 'form-control')) ?>
</div>
<div class="form-group">
<?php echo $this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?php echo $this -> Form -> end() ?>
</section>