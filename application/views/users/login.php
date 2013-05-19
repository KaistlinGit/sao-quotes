<?php echo Form::open() ?>

<div>
    Pseudo : 
    <?php echo Form::input('username'/*, $values['username']*/) ?>
</div>

<div>
    Password : 
    <?php echo Form::password('password', '') ?>
</div>

<?php echo Form::submit(NULL, 'Se connecter'); ?> 

<?php echo Form::close() ?>