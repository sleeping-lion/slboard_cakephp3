<article id="sl_main_question" class="sl_main_list">
	<h3><?php echo __('Question') ?></h3>
	<?php if($questions->count()): ?>
	<ul>
		<?php foreach ($questions as $index => $question): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($question['title'],30), array('controller' => 'questions', 'action' => 'view',$question['id'])) ?>
			<span class="sl_created_at"><?php echo $question['created_at'] ?></span>					
		</li>
		<?php endforeach ?>
		<?php unset($question) ?>
		<?php unset($questions) ?>
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'questions', 'action' => 'index'),array('class'=>'more')) ?>
</article>