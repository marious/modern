<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public function testimonials()
    {
        return $this->hasMany('App\models\Testimonial');
    }
}
