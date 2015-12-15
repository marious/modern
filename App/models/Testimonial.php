<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
    public function user()
    {
        return $this->hasOne('App\Model\User');
    }
}
