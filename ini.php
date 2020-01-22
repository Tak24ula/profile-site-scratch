<?php

register_shutdown_function('session_write_close');
session_start();


include_once __DIR__ . "/cnf/def.php";
include_once __DIR__ . "/cls/cmn/class_load.php";
$db_access_class = new \Mdl\Base\DbAccess();
