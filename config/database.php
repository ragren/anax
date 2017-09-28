<?php
return [
    "dsn"             => "sqlite:" . ANAX_INSTALL_PATH . "/src/comments.sqlite",
    'username'        => "root",
    'password'        => null,
    'driver_options'  => null,
    'table_prefix'    => null,
    'fetch_mode'      => \PDO::FETCH_OBJ,
    'session_key'     => 'Anax\Database',
    'verbose'         => true,
    'debug_connect'   => true,
];
