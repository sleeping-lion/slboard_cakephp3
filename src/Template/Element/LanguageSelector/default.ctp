<form action="/language_select" style="float:right">
	<select name="language">
		<option value="ko_KR" <?php if(!$session->check('Config.language')): ?>selected="selected"<?php endif ?>><?php echo __d('language','Korean') ?></option>
		<option value="en_US" <?php if($session->read('Config.language')=='en_US'): ?>selected="selected"<?php endif ?>><?php echo __d('language','English') ?></option>
		<option value="zh_CN" <?php if($session->read('Config.language')=='zh_CN'): ?>selected="selected"<?php endif ?>><?php echo __d('language','Chinese') ?></option>
	</select>
	<input value="<?php echo __('Change Language') ?>" type="submit" />
</form>