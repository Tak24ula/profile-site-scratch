<?php

class ClassLoad
{
    private static $dirs;

    public static function loadClass($class)
    {
        $class_code = strToLower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $class));
        $classFile = str_replace("\\", "/", $class_code) . '.php';
        $file_name = CLASS_DIR . DS . $classFile;
        if (is_file($file_name)) {
            require $file_name;
            return true;
        }
    }
}

spl_autoload_register( [ 'ClassLoad' , 'loadClass' ] );
