<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Question'), array('controller' => 'questions', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Question')) ?>
<section id="sl_question_add">
<?php echo $this -> Form -> create('Question'); ?>
<?php if(!$session->check('Auth.User')): ?>
<?php 
echo $this -> Form -> input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control','required'=>'required'));
echo $this -> Form -> input('password', array('div' => array('class' => 'form-group'), 'class' => 'form-control','required'=>'required'));
?>
<?php endif ?>
<?php
echo $this -> Form -> input('secret', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('QuestionContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php if (!$session -> read('Auth.User')): ?>
<?php echo $this->Recaptcha->display() ?>
<?php endif ?>
<br />
<div class="form-group">
<?php echo $this -> Form ->Button(__('Save Article'),array('class' => 'btn btn-primary')) ?>
</div>
<?php echo $this -> Form -> end() ?>
</section>