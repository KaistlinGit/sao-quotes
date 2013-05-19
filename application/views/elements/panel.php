<?php 
$u = Auth::instance()->get_user();

if ($u === null): ?>
<div class="panel-wrapper">
	<div class="panel-logo">
		<ul>
			<li class="h1title"><?php echo HTML::anchor('page/home', 'Index') ?></li>
			<li class="h1title"><?php echo HTML::anchor('user/login', 'Connexion') ?></li>
		</ul>
	</div>
	<div class="clearleft"></div>
</div> 
<?php else: ?>

<div class="panel-wrapper">

	<div class="panel-login">
		<?php
		echo $u->username;
		echo ', <b>';
		echo html::anchor('user/logout', 'déconnexion');
		echo '</b>';
		?>
	</div>
	
	<div class="clearleft"></div>
</div> 

<?php endif; ?>