<header>
	<ul id="top_menu">
		<?php if($session->check('Auth.User')): ?>
		<li><?php echo $this -> Html -> link($session->Read('Auth.User.name'),array('controller'=>'users','action'=>'edit',$session->Read('Auth.User.id'))) ?><?php echo __('Welcome') ?></li>
		<li><?php echo $this -> Html -> link(__('Logout'),array('controller'=>'users','action'=>'logout')) ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users','action'=>'agree')) ?></li>
		<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users','action'=>'login')) ?></li>
		<?php endif ?>
	</ul>
	<nav class="container">
		<h1><?php echo $this->Html->link(__('Home Title'),'/',array('title'=>'홈으로')) ?></h1>
		<ul class="nav nav-pills">
  <li role="presentation" class="dropdown<?php echo $this->App->activeClass(array('Intro','Histories','pages'),true) ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      <?php echo __('Intro') ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
    	<li><?php echo $this->Html->link(__('Intro'), array('controller' => 'intro','action'=>'index'),array('title'=>__('Intro')))?></li>
    	<li><?php echo $this->Html->link(__('History'), array('controller' => 'histories','action'=>'index'),array('title'=>__('History')))?></li>
    </ul>
  </li>
			<li <?php echo $this->App->activeClass('Contacts') ?>><?php echo $this->Html->link(__('Contact').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'contacts','action'=>'add'),array('escape'=>false,'title'=>__('Contact')))?></li>
			<li <?php echo $this->App->activeClass('Blogs') ?>><?php echo $this->Html->link(__('Blog').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'blogs','action'=>'index'),array('escape'=>false,'title'=>__('Blogs'))); ?></li>			
			<li <?php echo $this->App->activeClass('Galleries') ?>><?php echo $this->Html->link(__('Gallery').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'galleries','action'=>'index'),array('escape'=>false,'title'=>__('Galleries')))?></li>
			<li <?php echo $this->App->activeClass('Questions') ?>><?php echo$this->Html->link(__('Question').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'questions','action'=>'index'),array('escape'=>false,'title'=>__('Question')))?></li>
			<li <?php echo $this->App->activeClass('Faqs') ?>><?php echo$this->Html->link(__('Faq').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'faqs','action'=>'index'),array('escape'=>false,'title'=>__('Faq')))?></li>
			<li <?php echo $this->App->activeClass('Notices') ?>><?php echo$this->Html->link(__('Notice').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'notices','action'=>'index'),array('escape'=>false,'title'=>__('Notice')))?></li>
			<li <?php echo $this->App->activeClass('GuestBooks') ?>><?php echo$this->Html->link(__('Guest Book').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'guest_books','action'=>'index'),array('escape'=>false,'title'=>__('Guest Book')))?></li>
			<li <?php echo $this->App->activeClass('Portfolios') ?>><?php echo$this->Html->link(__('Portfolio').'<span class="visible-xs glyphicon glyphicon-chevron-right pull-right"></span>', array('controller' => 'portfolios','action'=>'index'),array('escape'=>false,'title'=>__('Portfolios')))?></li>
		</ul>
	</nav>
</header>
