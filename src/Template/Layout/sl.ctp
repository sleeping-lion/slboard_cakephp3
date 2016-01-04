<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />	
	<title><?php echo $homepage_title ?></title>
	<?php
		echo $this->Html->meta('icon');
				//echo $this->Less->less('index.css');
		echo $this->Html->css(array('bootstrap.min.css','index.css'));
		echo $this-> fetch('css');
		echo $this->Html->meta('keywords','slboard,php,게시판,무료게시판,공개게시판,cakephp,rails,cms');
	?>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="author" content="Sleeping-Lion" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<?php echo $this->element ('header')?>
<section id="mom">
	<section id="main" class="container">
		<?php if($this->request->params['controller']=='Home'): ?>
		<section id="slboard_main" class="slboard_main">
		  <?php echo $this->element('jumbotron')?>
		</section>
		<?php else: ?>
		<div class="page-header">
			<h1 itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement"><span itemprop="headline"><?php echo $this -> fetch('title')?></span></h1>
			<?php echo $this->Html->getCrumbList(array('class'=>'breadcrumb'),__('Home')); ?>
		</div>
		<?php endif ?>
		<?php if($this->request->params['controller']!='pages'): ?>		
		<section class="sub_main">
		<?php endif ?>
			<?php echo $this->Flash->render() ?>
			<?php // echo $this->element('ad') ?>
			<?php echo $this->fetch('content')?>
		<?php if($this->request->params['controller']!='pages'): ?>		
		</section>
		<?php endif ?>
		<?php if($this->request->params['controller']!='pages'): ?>
		<?php echo $this->element('aside')?>
		<?php endif ?>		
	</section>
</section>
<?php echo $this-> element ('footer')?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"></div>
<?php echo $this->Html->script(array('jquery.tools.min.js','bootstrap.min.js','plugin/jquery.tagcanvas.min.js','common.js')) ?>
<?php echo $this -> fetch('script')?>
</body>
</html>
