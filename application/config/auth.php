<?php
return array(
    'driver'       => 'orm',
    'hash_method'  => 'sha256',
    'hash_key'     => 'ClefDeHashage',         // A changer
    'lifetime'     => 1209600,
    'session_key'  => 'auth_user',
);
?>