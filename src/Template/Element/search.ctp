<div class="hidden-xs">
	<form class="form-inline sl_search_form" role="form" method="get" style="float:right">
    <div class="input-group">
     <div class="input-group-btn">
     		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php if(isset($searchType)): ?><?php echo $searchTypeOption[$searchType] ?><?php else: ?><?php echo $searchTypeOption['title'] ?><?php endif ?> &nbsp; <span class="caret"></span></button>
     		<ul class="dropdown-menu" role="menu">
        	<?php foreach($searchTypeOption as $index=>$value): ?>
         <li><?php echo $this->Html->link($value,array('controller'=>$this->request->params['controller'],'action'=>$this->request->params['action'],'?'=>array('search_type'=>$index))) ?></li>
         <?php endforeach ?>
     		</ul>
			</div>  	
			<?php echo $this->Form->input('search_type',array('type'=>'select','id'=>false,'name'=>'search_type','div'=>false,'style'=>'display:none','class'=>'search_type form-control','options'=>$searchTypeOption,'selected'=>$searchType));?>
			<?php echo $this->Form->input('search_text',array('type'=>'search','id'=>false,'name'=>'search_text','div'=>false,'class'=>'form-control','value'=>$searchText,'placeholder'=>__('insert search word'),'maxlength'=>60,'required'=>"required"));?>
			<span class="input-group-btn">
  			<input type="submit" class="btn btn-default" value="<?php echo __('Search') ?>" />
  		</span>
  	</div>
	</form>
</div>

<div class="visible-xs-block col-xs-12" style="margin:20px 0 0">
	<form class="form-inline sl_search_form" role="form" method="get">
		<div class="row">
	<?php echo $this->Form->input('search_type',array('type'=>'select','id'=>false,'name'=>'search_type','div'=>array('class'=>'col-xs-4','style'=>'padding-left:0'),'class'=>'search_type form-control','options'=>$searchTypeOption,'selected'=>$searchType));?>	
  <div class="input-group col-xs-8">	
	<?php echo $this->Form->input('search_text',array('type'=>'search','id'=>false,'name'=>'search_text','div'=>false,'class'=>'form-control','value'=>$searchText,'placeholder'=>__('insert search word'),'maxlength'=>60,'required'=>"required"));?>
	<span class="input-group-btn">
  	<input type="submit" class="btn btn-default" value="<?php echo __('Search') ?>" />
  </span>
	</div>
	</div>
	</form>
</div>