<?php
class Config
{
    static $configArray;

    public static function read($name)
    {
        return self::$configArray[$name];
    }

    public static function write($name, $value)
    {
        self::$configArray[$name] = $value;
    }
}
// db
Config::write('db.host', 'localhost');
Config::write('db.basename', 'shortcircuit');
Config::write('db.user', 'DWP');
Config::write('db.password', '123456');