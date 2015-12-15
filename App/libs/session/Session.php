<?php

namespace App\libs\session;

// A class to help work with Sessions
// In our case, primarily to manage logging users in and out
// keep in mind when working with sessions that it is generally
// inadvibale to store DB-related objects in sessions

class Session
{
    private $logged_in;
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;

    public function __construct()
    {
        // session_start();
        $this->check_login();
        if ($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }
    }

    /**
     * check if this session exists.
     *
     * @param string $name
     *
     * @return mixed
     */
    public static function exists($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }

    /**
     * create session name and put in value.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return mixed
     */
    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * get the session value by its name.
     *
     * @return mixed
     */
    public static function get($name)
    {
        return self::exists($name) ? $_SESSION[$name] : null;
    }

    /**
     * Delete the session by it's name.
     *
     * @param string $name
     */
    public static function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * check the logged_in.
     *
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->logged_in;
    }

    /**
     *  login.
     *
     * @return bool
     */
    public function login($user)
    {
        // database should find user based on username/password
        if ($user) {
            $_SESSION['user'] = $user;
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->first_name = $_SESSION['first_name'] = $user->first_name;
            $this->last_name = $_SESSION['last_name'] = $user->last_name;
            $this->email = $_SESSION['email'] = $user->email;
            $this->logged_in = true;
        }
    }

    /**
     * logout.
     */
    public function logout()
    {
        self::delete('user');
        self::delete('user_id');
        self::delete('first_name');
        self::delete('last_name');
        self::delete('email');
        session_destroy();
        unset($this->user_id);
        $this->logged_in = false;
    }

    /**
     * Check the user session exists
     * if session found make logged_in true.
     */
    private function check_login()
    {
        if (self::exists('user_id')) {
            $this->user_id = self::get('user_id');
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->logged_in = false;
        }
    }

    /**
     * flash message for the session if its has been found return it
     * if not create one and put in it your message.
     *
     * @param string $name
     * @param string $string
     *
     * @return string $session
     */
    public static function flash($name, $string = null)
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);

            return $session;
        } elseif (isset($string)) {
            self::put($name, $string);
        } else {
            return;
        }
    }
}
