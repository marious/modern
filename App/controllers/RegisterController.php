<?php

namespace App\controllers;

use App\models\User;
use App\Libs\Validation\Validator;
use App\Libs\Session\Session;
use App\Email\SendEmail;
use App\Models\UserPending;

class RegisterController extends BaseController
{
    /**
     * Show register page.
     *
     * @return response
     */
    public function showRegisterPage()
    {
        echo $this->blade->render('register');
    }

    /**
     * Handle post data get from register page.
     */
    public function postshowRegisterPage()
    {
        $validation_data = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:User',
            'verify_email' => 'required|email|equalTo:email',
            'password' => 'required|min:3',
            'verify_password' => 'required|equalTo:password',
        ];
        // Validate data
        $validator = new Validator();

        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            Session::flash('errors', $errors);
            echo $this->blade->render('register');
            exit;
        }

        // if validation fails, go back to register page
        // dispalay error messages
        // save this data into a database
        $user = new User();
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->save();

        $token = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));
        $user_pending = new UserPending;
        $user_pending->token = $token;
        $user_pending->user_id = $user->id;
        $user_pending->save();


        $message = $this->blade->render('email.welcome-email', compact('token'));

        SendEmail::sendEmail($user->email, 'Welcome To Acme', $message);

        header('Location: /success');
        exit;
    }


    public function getVerifyAccount()
    {
        $user_id = 0;
        $token = $_GET['token'];

        // look up the tooken
        $user_pending = UserPending::where('token', '=', $token)->get();
        foreach ($user_pending as $item) {
            $user_id = $item->user_id;
        }

        if ($user_id > 0) {
            // make the user account active
            $user = User::find($user_id);
            $user->active = 1;
            $user->save();

            UserPending::where('token', '=', $token)->delete();

            header('Location: /account-activated');
            exit;
        } else {
            header('Location: /page-not-found');
            exit;
        }
    }
}
