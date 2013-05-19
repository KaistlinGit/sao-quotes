<?php
foreach ($users as $user)
{
    echo $user->CptUser.'. '.$user->username.'<br />';
}
echo html::anchor('user/logout', 'déconnexion');
?>