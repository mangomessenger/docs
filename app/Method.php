<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    /**
     * Get the tags for the method.
     */
    public function tags()
    {
        return $this->hasMany('App\MethodTag');
    }

    /**
     * Get the params for the method.
     */
    public function params()
    {
        return $this->hasMany('App\MethodParams');
    }
}