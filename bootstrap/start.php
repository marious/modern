<?php
// composer autoload file
require __DIR__.'/../vendor/autoload.php';
session_start();

// Pretty error reporting
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

// Sessin Handler class
//$session = new duncan3dc\Sessions\SessionInstance("my-app");
// $session = new App\Libs\Session\Session;

// routing handler
$router = new AltoRouter();
