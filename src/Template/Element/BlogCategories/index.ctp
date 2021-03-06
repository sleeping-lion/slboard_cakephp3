<article id="sl_blog_categories" class="box sl_aside">
  <div class="box_header">
    <h2><?php echo __('Blog') ?></h2>
    <div class="box_icon">
      <a href="#" class="btn_minimize"><i class="glyphicon glyphicon-chevron-up"></i></a>
      <a href="#" class="btn_close"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
  </div>
	<div class="box_content">
		<ul>
			<li <?php if(empty($this->request->query['blog_category_id'])): ?>class="active"<?php endif ?>><a href=""><?php echo __('All') ?></a></li>
    	<?php if(isset($asideBlogCategories)): ?>
    	<?php foreach($asideBlogCategories as $blogCategory): ?> 		
    	<?php if(empty($blogCategory->blog_category_id)): ?>
			<li>
      	<?php if($blogCategory->leaf): ?>
       <?php echo $this->html->link($blogCategory->title.'('.$blogCategory->blogs_count.')',array('controller'=>'blogs','action'=>'index','?'=>array('blog_category_id'=>$blogCategory->id))) ?>
      	<?php else: ?>
      	<span class="c_pointer"><span><?php echo $blogCategory->title ?></span><span class="cursor">&nbsp;&gt;&gt;</span></span>  	
      	<?php endif ?>
      	<ul>
    			<?php foreach($asideBlogCategories as $blogSubCategory): ?>
      		<?php if($blogCategory->id==$blogSubCategory->blog_category_id): ?>
      		<li <?php if(isset($this->request->query['blog_category_id'])): ?><?php if($this->request->query['blog_category_id']==$blogSubCategory->id): ?>class="active"<?php endif ?><?php endif ?>>
      		<?php echo $this->Html->link($blogSubCategory->title.'('.$blogSubCategory->blogs_count.')',array('controller'=>'blogs','action'=>'index','?'=>array('blog_category_id'=>$blogSubCategory->id))) ?>
      		</li>
      		<?php endif ?>
      		<?php endforeach ?>
      	</ul>
     	</li>
     <?php endif ?>
     <?php endforeach ?>     	
    	<?php else: ?>
			<li><?php echo __('No Article') ?></li>
    	<?php endif ?>
		</ul>
		<?php echo $this -> Html -> link(__('more'),array('controller'=>'blogs','action'=>'index')) ?>
	</div> 
</article>