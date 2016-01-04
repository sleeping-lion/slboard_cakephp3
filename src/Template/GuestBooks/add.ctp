<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Guest Book'), array('controller' => 'guest_books', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Guest Book')) ?>
<section id="sl_guest_book_add">
<?php echo $this -> Form -> create('GuestBook') ?>
<?php if(!$session->check('Auth.User')): ?>
<?php 
echo $this -> Form -> input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('password', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php endif ?>
<?php
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('GuestBookContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php if (!$session -> read('Auth.User')): ?>
<?= $this->Recaptcha->display() ?>
<?php endif ?>
<br />
<div class="form-group">
<?php echo $this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?php echo $this -> Form -> end() ?>
</section>