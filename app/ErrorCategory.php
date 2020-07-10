<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'description',
    ];
}
