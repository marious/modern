<?php
namespace App\auth;

use App\models\User;

class LoggedIn
{
    /**
     * Check user is logged in or not
     * @return type
     */
    public static function user()
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            return $user;
        } else {
            return false;
        }
    }
}