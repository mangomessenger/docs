<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Get the params for the type.
     */
    public function params()
    {
        return $this->hasMany('App\TypeParam', 'ref_type_id');
    }

    /**
     * Get the params for the type.
     */
    public function methods()
    {
        return $this->hasMany('App\Method', 'return_type_id');
    }
}
