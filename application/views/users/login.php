<?php echo Form::open() ?>

<div>
    Pseudo : 
    <?php echo Form::input('username', $values['username']) ?>
</div>

<div>
    Password : 
    <?php echo Form::password('password', '') ?>
</div>

<div class="error">
	<?php echo $error ?>
</div>

<?php echo Form::submit("submitForm", 'Se connecter'); ?> 
<?php echo Form::submit("submitForm", "Inscription"); ?> 

<?php echo Form::close() ?>