<?= $this -> Html -> script(array('index.js'), array('inline' => false)); ?>
<section id="main_main">
	<section class="row">	
		<?=$this->element('Notices/index') ?>
		<?=$this->element('Questions/index') ?>
		<?=$this->element('GuestBooks/index') ?>
	</section>
	<section class="row">
		<?=$this->element('Galleries/index') ?>
		<?=$this->element('Blogs/index') ?>
	</section>
</section>