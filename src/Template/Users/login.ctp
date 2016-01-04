<?php $this -> Html -> addCrumb(__('User'), array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> Html -> addCrumb(__('Login'), array('controller' => 'users', 'action' => 'login')) ?>
<?php $this -> assign('title', __('Login')) ?>
<?php echo $this -> Form -> create('User',array('id'=>"sl_login_form",'role'=>"form" )) ?>
	<input type="hidden" id="message_no_email" value="<?php echo _('not_insert_email') ?>" />
	<input type="hidden" id="message_no_password" value="<?php echo _('not_insert_password') ?>" />
	<input type="hidden" id="message_invalid_email" value="<?php echo _('invalid_email') ?>" />
	<input type="hidden" id="message_invalid_password" value="<?php echo _('invalid_password') ?>" />
	<?php if(isset($this->request->params['redirect'])): ?>
	<input type="hidden" name="redirect_url" value="<?php echo $_SERVER['HTTP_REFERER'] ?>"  />
	<?php endif ?>
  <div class="form-group">
		<?php echo $this -> Form -> input('email', array('type' => 'email', 'class' => 'form-control')) ?>
  </div>
  <div class="form-group">
		<?php echo $this -> Form -> input('encrypted_password', array('label'=>__('Password'),'type'=>'password', 'class' => 'form-control')) ?>  	
  </div>
  <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="remember_email"><?php echo _('remember_email') ?>
        </label>
      </div>
  </div>
  <div class="form-group">
    	<?php echo $this -> Form ->Button(__('Login'),array('class' => 'btn btn-primary')) ?>
  </div>
<?php echo $this -> Form -> end(); ?>
