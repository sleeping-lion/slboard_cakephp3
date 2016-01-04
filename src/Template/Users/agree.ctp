<?php $this -> Html -> addCrumb(__('User'), array('controller' => 'users', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Agree User'), array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Agree User')) ?>
<?php echo $this->Form->create($agree) ?>
		<article>
			<h3>회원 이용약관</h3>
			<?php echo $this->element('Users/agreement1') ?>
		 <div class="checkbox">
		 <?php echo $this->Form->input('agree1') ?>
		</div>					
		</article>
		<article>
			<h3>개인정보 수집 및 이용에 대한 안내</h3>
			<?php echo $this->element('Users/agreement2') ?>
		 <div class="checkbox">
		 <?php echo $this->Form->input('agree2') ?>
		</div>			
		</article>
		<br />
		<div id="sl_content_bottom_buttons">
			<a href=""  class="btn btn-default"><?php echo _('disagree') ?></a>&nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="<?php echo _('agree') ?>" />
		</div>
<?php echo $this -> Form -> end(); ?>
