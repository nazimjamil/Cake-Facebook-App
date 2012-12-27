<?php echo $this -> Html -> docType('html5'); ?>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this -> Html -> charset(); ?>
	<meta name="viewport" content="width=device-width" />
	<title> <?php echo $page_title; ?> </title>
	<?php
		echo $this -> Html -> meta('icon');
		echo $this -> Html -> css(array('app', 'foundation.min.css'));
	?>
</head>
<body>
	<?php echo $this -> Session -> flash(); ?>
	<div class="row">
		<div class="twelve columns">
			<h2><?php echo ($like ? 'You like the parent page' : 'You do not like the parent page'); ?></h2>
		</div>
	</div>
	<?php
	echo $this -> Html -> script(array('jquery-1.8.3.min.js', 'foundation.min.js', 'jquery.foundation.forms.js', 'jquery.foundation.mediaQueryToggle.js', 'modernizr.foundation.js'));
	?>
</body>
</html>