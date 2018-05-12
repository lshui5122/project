<?php
namespace classes\util;

class Config
{
    public static $config;
    public $mysqlServer;
    public $mysqlUser;
    public $mysqlPassword;
    public $mysqlDB;
    
    public static function getConfig($reload = false){
        if(isset($config)==false || $reload==true){
            $ini =  parse_ini_file(self::getApplicationRoot()."/config/m5Project.ini");
            $config=new Config();
            $config->mysqlServer=$ini['mysqlserver'];
            $config->mysqlUser=$ini['mysqluser'];
            $config->mysqlPassword=$ini['mysqlpassword'];
            $config->mysqlDB=$ini['mysqldb'];
            return $config;
        }
        return $config;
    }
    
    public static function getApplicationRoot(){
        //$path = "/Library/WebServer/Documents/m5Project/";
        $path = $_SERVER['DOCUMENT_ROOT'] . "/m5Project";
        return $path;
    }
}