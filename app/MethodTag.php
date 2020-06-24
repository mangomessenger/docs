<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodTag extends Model
{
    /**
     * Get the methods for the tag.
     */
    public function methods()
    {
        return $this->hasMany('App\Method', 'tag_id');
    }
}
