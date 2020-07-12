<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
    /**
     * @var mixed
     */

    /**
     * Get the params for the type.
     */
    public function params()
    {
        return $this->hasMany('App\TypeParam', 'type_id');
    }

    /**
     * Get the params for the type.
     */
    public function methods()
    {
        return $this->hasMany('App\Method', 'return_type_id');
    }
}
