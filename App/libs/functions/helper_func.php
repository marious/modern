<?php

function set_value($field)
{
    if (isset($_REQUEST[$field])) {
        return $_REQUEST[$field];
    }
    return '';
}


function csrf_field()
{
    $token_value = $_SESSION['_token'] = md5(uniqid());
    return '<input type="hidden" name="_token" value="'. $token_value .'">';
}

function check_token($token)
{
    $_SESSION['_token'] = $_SESSION['_token'] ? $_SESSION['_token'] : null;

    if (isset($_SESSION['_token']) && $token == $_SESSION['_token']) {
        return true;
    } else {
        header('HTTP/1.0 400 Bad Request');
        exit;
    }
}