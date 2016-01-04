<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($guestBook['title'], array('controller' => 'guest_books', 'action' => 'view', $guestBook['id'])) ?>
<?php $this -> assign('title', $guestBook['title']) ?>
<section id="slboard_question_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($guestBook['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo __('Writer') ?> : <span  itemprop="author"><?php if($guestBook['user_id']): ?><?php echo $guestBook['name'] ?><?php else: ?><?php echo $guestBook['name'] ?><?php endif ?></span>&nbsp;&nbsp;&nbsp; 
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $guestBook['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $guestBook['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($guestBook->guest_book_content->content); ?></div>
    </div>
  </div>
	<?php echo $this->element('GuestBookComments/index')?>
	<?php echo $this->element('GuestBookComments/add')?>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php if($this->App->checkAnonAuth($guestBook,'GuestBook',$this->Session)): ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$guestBook['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$guestBook['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
			<?php else: ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'check_password',$guestBook['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Html-> link(__('Delete'),array('action' => 'check_password',$guestBook['id'],'?'=>array('delete'=>true)),array('class'=>'btn btn-default')) ?>
			<?php endif ?>
   </div>
	</div>
</section>
