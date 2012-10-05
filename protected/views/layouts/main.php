<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- Included CSS Files (Compressed) -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/stylesheets/foundation.min.css"/>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/stylesheets/app.css"/>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/melasa.css"/>

		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/javascripts/modernizr.foundation.js"></script>

		<!-- Included JS Files (Compressed) -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/javascripts/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/javascripts/foundation.min.js"></script>

		<!-- Initialize JS Plugins -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/javascripts/app.js"></script>

		<?php /*
		  <!-- IE Fix for HTML5 Tags -->
		  <!--[if lt IE 9]>
		  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		  <![endif]-->

		  <?php /*
		  <!-- blueprint CSS framework -->
		  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		  <!--[if lt IE 8]>
		  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		  <![endif]-->

		  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		 */ ?>

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>

		<script type="text/javascript">
			$().ready(function(){
				$(document).foundationTopBar();
				$(document).foundationCustomForms();
			});
		</script>
	</head>

	<body>

		<nav class="top-bar">
			<ul>
				<li class="name"><h1>
						<a href="<?= CHtml::normalizeUrl(array('/')) ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
					</h1></li>
				<li class="toggle-topbar"><a href="#"></a></li>
			</ul>
			<section>
				<ul class="left">
					<li<?= (Yii::app()->controller->id == 'report') ?  ' class="active"' : ''?>><a href="<?= CHtml::normalizeUrl(array('/report')) ?>">Week view</a></li>
					<li class="has-dropdown<?= (Yii::app()->controller->id == 'projects') ?  ' active' : ''?>">
						<a href="#">Projects CRUD</a>
						
						<ul class="dropdown">
							<li><a href="<?= CHtml::normalizeUrl(array('/projects')) ?>">View</a></li>
							<li><a href="<?= CHtml::normalizeUrl(array('/projects/create')) ?>">Create</a></li>
							<li><a href="<?= CHtml::normalizeUrl(array('/projects/admin')) ?>">Admin</a></li>
						</ul>
					</li>
					<li class="has-dropdown<?= (Yii::app()->controller->id == 'asa') ?  ' active' : ''?>">
						<a href="#">ASA CRUD</a>

						<ul class="dropdown">
							<li><a href="<?= CHtml::normalizeUrl(array('/asa')) ?>">View</a></li>
							<li><a href="<?= CHtml::normalizeUrl(array('/asa/create')) ?>">Create</a></li>
							<li><a href="<?= CHtml::normalizeUrl(array('/asa/admin')) ?>">Admin</a></li>
						</ul>
					</li>
					<li<?= (!empty(Yii::app()->controller->module) and Yii::app()->controller->module->id == 'user') ?  ' class="active"' : ''?>><a href="<?= CHtml::normalizeUrl(array('/user')) ?>">Profile</a></li>
					<!--<li><a><?= Yii::app()->controller->id ?></a></li>-->
					<!--<li><a><?= Yii::app()->controller->action->id ?></a></li>-->
					<?php if (Yii::app()->user->isGuest): ?>
						<li><a href="<?= CHtml::normalizeUrl(Yii::app()->user->loginUrl) ?>">Login</a></li>
					<?php else: ?>
						<li><a href="<?= CHtml::normalizeUrl('/user/logout') ?>">Logout (<?= Yii::app()->user->name ?>)</a></li>
					<?php endif; ?>
				</ul>
			</section>
		</nav>
		
		<?php /*
		  <div id="mainmenu">
		  $this->widget('zii.widgets.CMenu', array(
		  'items' => array(
		  array('label' => 'Home', 'url' => array('/site/index')),
		  array('label' => 'ASA', 'url' => array('/asa')),
		  array('label' => 'Projects', 'url' => array('/projects')),
		  array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
		  array('label' => 'Contact', 'url' => array('/site/contact')),
		  array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
		  array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
		  ),
		  ));
		  </div><!-- mainmenu -->
		 */ ?>
		<?php if (isset($this->breadcrumbs)): ?>
			<div class="row">
				<div class="twelve columns">
					<?php
					$this->widget('Breadcrumbs', array(
						'tagName' => 'ul',
						'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
						'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
						'separator' => '',
						'links' => $this->breadcrumbs,
					));
					?><!-- breadcrumbs -->
				</div>
			</div>
		<?php endif ?>

		<?php echo $content; ?>

		<div class="row">
			<hr/>
			<div class="ten columns">
				<p>Copyright &copy; <?php echo date('Y'); ?> by gnysek.pl. All Rights Reserved.<br/><?php echo Yii::powered(); ?>
				</p>
			</div><!-- footer -->
		</div>

	</body>
</html>
