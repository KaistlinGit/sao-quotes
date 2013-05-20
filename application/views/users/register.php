<?php echo Form::open() ?>

<div>
    Pseudo : 
    <?php echo Form::input('username', ''/*$values['username']*/) ?>
</div>

<div>
    Mot de passe :
    <?php echo Form::password('password', '') ?>
</div>

<div>
    Retaper le mot de passe :
    <?php echo Form::password('password_again', '') ?>
</div>

<div>
    Addresse email :
    <?php echo Form::input('email', ''/*$values['email']*/) ?></td>
</div>

<div>
    <?php echo Form::submit("submitForm", "S'inscrire") ?> 
</div>

<?php echo Form::close() ?>

<?php var_dump($errors) ?>