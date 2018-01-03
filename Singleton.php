<?php
class Singleton
{
    private static $_instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {
        echo "单例类不能被clone"; 
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}
$singleton = Singleton::getInstance();
$singleton2 = Singleton::getInstance();
var_dump($singleton, $singleton2);
