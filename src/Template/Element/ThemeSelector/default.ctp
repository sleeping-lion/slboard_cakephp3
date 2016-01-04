<form action="/theme_select" style="float:right">
	<select name="theme">
		<option value="Default" <?php if(!$session->check('theme')): ?>selected="selected"<?php endif ?>><?php echo __d('theme','Default Theme') ?></option>
		<option value="Simple" <?php if($session->read('theme')=='Simple'): ?>selected="selected"<?php endif ?>><?php echo __d('theme','Simple Theme') ?></option>
		<option value="BlacknWhite" <?php if($session->read('theme')=='BlacknWhite'): ?>selected="selected"<?php endif ?>><?php echo __d('theme','BlacknWhite Theme') ?></option>
	</select>
	<input value="<?php echo __('Change Theme') ?>" type="submit" />
</form>