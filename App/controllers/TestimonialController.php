<?php

namespace App\controllers;

use App\models\Testimonial;
use App\auth\LoggedIn;
use App\libs\validation\Validator;

class TestimonialController extends BaseController
{

    public function getShowTestimonials()
    {
        $testimonials = Testimonial::all();

        echo $this->blade->render('testimonials', compact('testimonials'));
    }

    public function getShowAdd()
    {
        echo $this->blade->render('add-testimonials');
    }

    public function postShowAdd()
    {
        $validation_data = [
            'title' => 'required|min:3',
            'testimonial' => 'required|min:10',
        ];
        // Validate data
        $validator = new Validator();

        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            \App\libs\session\Session::flash('errors', $errors);
            echo $this->blade->render('add-testimonials');
            exit;
        }

        $testimonial = new Testimonial;
        $testimonial->title = $_POST['title'];
        $testimonial->testimonial = $_POST['testimonial'];
        $testimonial->user_id = LoggedIn::user()->id;
        $testimonial->save();

        header('Location: /testimonial-saved');
        exit;
    }
}
