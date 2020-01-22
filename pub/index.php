<?php
ini_set('display_errors', '1');

$path = __DIR__ . '/../ini.php';
if (!is_file($path)){
  // \ErrorException::
}
include_once $path;
Cmn\Dispatcher::dispach();
