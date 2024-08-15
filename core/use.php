<?php

require(__DIR__."/../vendor/autoload.php");
require(__DIR__."/../config.php");
require(__DIR__."/tom.php");
require(__DIR__."/db.php");

session_start();
ob_start();
use Jenssegers\Blade\Blade;
date_default_timezone_set("Asia/Bangkok");
$tom=new TOM();
$view = new Blade('views', 'cache');
include(__DIR__."/function.php");
$db = new db ($config->mysql->host,$config->mysql->user, $config->mysql->pass,$config->mysql->dbname,$config->mysql->port,$config->mysql->charset);

//include functions folder

$folder_function=__DIR__."/../functions/";
$files_function = glob($folder_function."*.php");
foreach($files_function as $phpFilefunction){   
    require($phpFilefunction); 
}
//include controllers folder
$folder_controller=__DIR__."/../controllers/";
$files_controller = glob($folder_controller."*.php");
foreach($files_controller as $phpFilecontroller){   
    require($phpFilecontroller); 
}
//include routes foler
$folder =   __DIR__."/../routes/"; 
$files = glob($folder."*.php"); // return array files

 foreach($files as $phpFile){   
     require($phpFile); 
}
//include routes foler
$tom->router->run();
?>