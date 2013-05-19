<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
   "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
	<title>SAO Quote</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php 
		// CSS
		echo HTML::style('css/default.css');

		/*
		// JS
		echo HTML::script('js/lib/jquery.min.js'); 
		echo HTML::script('js/script.js'); 

		// DATATABLE
		echo HTML::script('js/lib/dataTables/js/jquery.dataTables.min.js'); 
		echo HTML::style('js/lib/dataTables/css/jquery.dataTables.css');*/
	?>
</head>
<html>
    <head></head>
    <body>
		<div class="global">
			<div class="panel">
				<?php echo View::factory('elements/panel') ?>
			</div>

	        <div class="site">
	    		<?php echo $content ?>
	    	</div>
    	</div>
    </body>
</html>