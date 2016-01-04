<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Question')) ?>
<section id="sl_question_index">
	<article class="table-responsive">	
		<table width="100%" cellpadding="0" cellspacing="0" class="table table-striped">
			<colgroup>
				<col />
				<col />
				<col />
				<col />
				<col />
			</colgroup>
			<thead>
				<tr>
					<th class="sl_t_id"><?php echo $this -> App -> getOrderLink($this -> Paginator,'id') ?></th>
					<th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
					<th class="sl_t_name"><?php echo $this -> App -> getOrderLink($this -> Paginator,'name',__('Writer')) ?></th>
					<th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'count') ?></th>
					<th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($questions)): ?>
    		<?php foreach ($questions as $question): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $question['id']; ?></td>
        		<td class="sl_t_title">
        			<?php echo $this -> Html -> link($this->Text->truncate( $question['title'],50), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
        		</td>
        		<td class="sl_t_name"><?php if($question['user_id']): ?><?php echo $question['User']['name'] ?><?php else: ?><?php echo $question['name'] ?><?php endif ?></td>        		
        		<td class="sl_t_count"><?php echo $question['count'] ?></td>
        		<td class="sl_t_created_at"><?=$question['created_at'] ?></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($questions) ?>
    		<?php unset($question) ?>    		
    		<?php else: ?>
    		<tr>
    			<td colspan="5"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?>
			</tbody>
		</table>
	</article>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator) ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('rel'=>'nofollow','class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")) ?>		
		<?php echo $this-> element ('search') ?>
	</div>
</section>
