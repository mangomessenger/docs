<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodParam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'method_id', 'return_type_id'
    ];
}
