<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Method extends Model
{
    use SoftDeletes;
//    /**
//     * Get the tags for the method.
//     */
//    public function tags()
//    {
//        return $this->hasMany('App\MethodTag');
//    }

}
