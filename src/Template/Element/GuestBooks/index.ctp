<article id="sl_main_guest_book" class="sl_main_list">
	<h3><?php echo __('Guest Book') ?></h3>
	<?php if($guestBooks->count()): ?>
	<ul>
		<?php foreach ($guestBooks as $index => $guestBook): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($guestBook['title'],30), array('controller' => 'guest_books', 'action' => 'view',$guestBook['id'])) ?>
			<span class="sl_created_at"><?php echo $guestBook['created_at'] ?></span>				
		</li>		
		<?php endforeach ?>
		<?php unset($guestBook) ?>
		<?php unset($guestBooks) ?>		
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'guest_books', 'action' => 'index'),array('class'=>'more')) ?>
</article>