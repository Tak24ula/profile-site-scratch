<?php

define('DB_NAME' , '*******');
define('DB_HOST' , 'localhost');
define('DB_PORT' , '3306');
define('DB_USER' , '*******');
define('DB_PASS' , '*******');
define('DB_OPTION' , '');
define('DB_DRIVER' , 'mysql');

define('DS', DIRECTORY_SEPARATOR);

define('HOME_CAP' , 'home');
define('HOME_CTL' , 'profile');
define('HOME_ACN' , 'index');

define('PUBLIC_DN' , 'pub');
define('CONFIG_DN' , 'cnf');
define('TMPLATE_DN' , 'viw');
define('CLASS_DN' , 'cls');
define('COMMON_DN' , 'cmn');
define('CONTROLLER_DN' , 'ctl');
define('MODEL_DN' , 'mdl');
define('MANAGER_DN' , 'mng');
define('LIBRARY_DN' , 'lib');
define('ROOT_CTL' , 'root');
define('ROOT_ACN' , 'index');

define('DR_URI_No' , 0);

if(HOME_CAP == ''){
  define('HOME_URI' , HOME_CTL . DS . HOME_ACN);
}else{
  define('HOME_URI' , HOME_CAP . DS . HOME_CTL . DS . HOME_ACN);
}

define('HOME_PROTCOL', 'http://');
define('DOCUMENT_ROOT', str_replace("/pub","",$_SERVER['DOCUMENT_ROOT']));
define('APPLICATION_ROOT_PATH', '');
define('PUBLIC_DIR', DOCUMENT_ROOT . DS . PUBLIC_DN);
define('CLASS_DIR', DOCUMENT_ROOT . DS . CLASS_DN);
define('COMMON_DIR', CLASS_DIR . DS . COMMON_DN);
define('CONTROLLER_DIR', CLASS_DIR . DS . CONTROLLER_DN);
define('MANAGER_DIR', CLASS_DIR . DS . MANAGER_DN);
define('LIBRARY_DIR', CLASS_DIR . DS . LIBRARY_DN);
define('VIEW_DIR_PATH', DOCUMENT_ROOT . DS . TMPLATE_DN);
define('CONF_DIR', DOCUMENT_ROOT . DS . CONFIG_DN);
define('SERVER_NAME',(string)filter_input(INPUT_SERVER,'SERVER_NAME'));
