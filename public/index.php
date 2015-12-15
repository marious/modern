<?php

$controller = null;
$method = null;

include __DIR__.'/../bootstrap/start.php';
include __DIR__.'/../app/libs/functions/helper_func.php';
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();
include __DIR__.'/../bootstrap/db.php';
// routes file
include __DIR__.'/../routes.php';

$match = $router->match();

if (is_string($match['target'])) {
    list($controller, $method) = explode('@', $match['target']);
}

if (($controller != null) && (is_callable(array($controller, $method)))) {
    $object = new $controller();
    call_user_func_array(array($object, $method), array($match['params']));
} elseif ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo "Cannot find $controller -> $method";
    exit;
}
