<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="<?= $this->language; ?>" dir="<?= $this->direction; ?>"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive())
    $menu = $menu->getActive()->alias;
else
	$menu = "";

if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

JHTML::_('behavior.mootools');
$analytics = 'UA-35347096-1'; // FIXME Update to client ID
$typekit = "jvf6dch";
?>

<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<!--[if (gt IE 8) | (IEMobile)]><!-->
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.css">
		<!--<![endif]-->
		<!--[if (lt IE 9) & (!IEMobile)]>
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template-ie.css">
		<![endif]-->
	<?php else: ?>
		<!--[if (gt IE 8) | (IEMobile)]><!-->
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
		<!--<![endif]-->
		<!--[if (lt IE 9) & (!IEMobile)]>
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template-ie.min.css">
		<![endif]-->
	<?php endif; ?>

	<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.min.js"></script>
	<?php if ($typekit): ?>
		<!-- load typekit -->
		<script type="text/javascript" src="http://use.typekit.com/<?= $typekit ?>.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php endif; ?>
</head>

<body class="<?= $menu ?>">

	<div id="wrapper">
		<div id="header"><div><div><div><div class="container">
			<jdoc:include type="modules" name="header" style="rounded" />
			<div class="clear"></div>
		</div></div></div></div></div>

		<div id="main"><div class="container">

			<?php if ($this->countModules('top')): ?>
			<div id="top">
				<jdoc:include type="modules" name="top" style="rounded" />
			</div>
			<?php endif; ?>
			
			<?php if ($this->countModules('sidebar-left')): ?>
			<div id="sidebar-left"><div>
				<jdoc:include type="modules" name="sidebar-left" style="rounded" />
				<div class="clear"></div>
			</div></div>
			<?php endif; ?>

			<div id="content"><div>
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div></div>

			<div id="sidebar-right" class="<?php
							if (!$this->countModules('sidebar-left')) {
								echo 'no-sidebar';
							} else {
								echo 'with-sidebar';
							}
					?>">
				<jdoc:include type="modules" name="sidebar-right" style="rounded" />
				<div class="clear"></div>
			</div>

			<div class="clear"></div>

			<div id="bottom">
				<jdoc:include type="modules" name="bottom" style="rounded" />
			</div>
			<div class="clear"></div>
		</div></div>

		<div id="footer"><div><div class="container">
			<jdoc:include type="modules" name="footer" style="rounded" />
			<div id="copyright">
				<div>&copy; BrownStones Sports Lounge and Restaurant <?php echo date('Y') ?>. All Rights Reserved.<br/>
					Site by <a href="http://ccistudios.com" target="_blank">CCI Studios</a><br/>
				</div>
			</div>
		</div></div></div>
	</div>

	<div id="debug">
		<jdoc:include type="modules" name="debug" style="xhtml" />
	</div>

	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/columns.js"></script>
		<script src="/templates/<?= $this->template ?>/js/dropmenu.js"></script>
		<script src="/templates/<?= $this->template ?>/js/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/js/lettering.js"></script>
		<script src="/templates/<?= $this->template ?>/js/menu.js"></script>
		<script src="/templates/<?= $this->template ?>/js/rollover.js"></script>
		<script src="/templates/<?= $this->template ?>/js/scripts.js"></script>
	<?php else: ?>
		<?php if ($analytics): ?>
			<script>
				var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
				(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
					g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
					s.parentNode.insertBefore(g,s)}(document,"script"));
		  	</script>
		<?php endif; ?>
		<script src="/templates/<?= $this->template ?>/js/scripts-ck.js"></script>
	<?php endif; ?>
</body>
</html>
