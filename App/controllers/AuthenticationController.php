<?php

namespace App\controllers;

use App\Models\User;
use App\Libs\Session\Session;

class AuthenticationController extends BaseController
{

    /**
     * Shows the login page
     * @return html
     */
    public function showLoginPage()
    {
        echo $this->blade->render('login', ['signer' => $this->signer]);
    }

    /**
     * the login data post process here
     * @return [type] [description]
     */
    public function postShowLoginPage()
    {
        check_token($_POST['_token']);

        $okay = true;
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Look up the user
        $user = User::where('active', 1)->where('email', $email)->first();

        if ($user != null) {
            // validate credentials
            if (!password_verify($password, $user->password)) {
                $okay = false;
            }
        } else {
            $okay = false;
        }

        if ($okay) {
            // if valid, log them
            $this->session->login($user);
            header('Location: /');
            exit;
        } else {
            // if not valid redirect to the login page
            Session::flash('errors', ['Invalid Login']);
            echo $this->blade->render('login');
        }
    }

    /**
     * Logout the user.
     *
     * @return response
     */
    public function getLogoout()
    {
        $this->session->logout();
        header('Location: /login');
        exit;
    }
}
