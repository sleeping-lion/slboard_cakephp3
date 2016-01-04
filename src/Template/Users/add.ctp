<?php $this -> Html -> addCrumb(__('User'), array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> Html -> addCrumb(__('Add User'), array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add User')) ?>
<section id="sl_board_user_new">
<?php echo $this -> Form -> create('User',array('type'=>'file')) ?>
	<input type="hidden" id="message_no_email" value="<?php echo __('not_insert_email') ?>" />
	<input type="hidden" id="message_no_password" value="<?php echo __('not_insert_password') ?>" />
	<input type="hidden" id="message_invalid_email" value="<?php echo __('invalid_email') ?>" />
	<input type="hidden" id="message_invalid_password" value="<?php echo __('invalid_password') ?>" />
	<input type="hidden" id="message_exists_email" value="<?php echo __('exists_email') ?>" />	
  <div class="form-group row">
  	<div class="col-md-8 col-xs-12">
		<?php echo $this -> Form -> input('email', array('type' => 'email','class' => 'form-control')) ?>
   </div>
  	<div class="col-md-4 col-xs-12">
    	<label for="check_email_available_button"  style="visibility:hidden"><?php echo __('label_check_email_available') ?></label>  		
  		<input type="button" id="check_email_available_button" class="form-control btn btn-success" value="<?php echo __('check_email_available') ?>" />
  	</div>
  </div>
  <div class="form-group row">
  	<div class="col-md-12 col-xs-12">
		<?php echo $this -> Form -> input('password', array('type' => 'password','class' => 'form-control')) ?>
   </div>
  </div>
  <div class="form-group">
		<?php echo $this -> Form -> input('password_confirm', array('type' => 'password','class' => 'form-control')) ?>   
  </div>
  <div class="form-group">
    <?php echo $this -> Form -> input('name', array('class' => 'form-control')) ?>
  </div>
  <div class="form-group"
    <?php echo $this -> Form -> input('nickname', array('class' => 'form-control')) ?>
  </div>  
  <div class="form-group">
    <?php echo $this -> Form -> input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control')) ?>
  </div>
  	<div class="form-group">
    <?php echo $this -> Form -> input('UserPhoto.0.photo', array('type' => 'file', 'div' => array('class' => 'form-group'))) ?>
		<?php echo $this -> Form -> input('UserPhoto.0.photo_dir', array('type' => 'hidden', 'div' => array('class' => 'form-group'), 'class' => 'form-control')) ?>
  	</div>  
  <?php echo $this -> Form -> button(__('Save Article'),array('div' => array('class' => 'form-group'), 'class' => 'btn btn-primary')) ?> 
	<?php echo $this -> Form -> end() ?>
</section>