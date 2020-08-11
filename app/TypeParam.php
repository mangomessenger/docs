<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeParam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type_id', 'return_type_id'
    ];

    /**
     * Get the Type record associated with the TypeParam.
     */
    public function returnType()
    {
        return $this->hasOne('App\Type', 'id', 'return_type_id');
    }

    public function isArray()
    {
        return $this->is_array ? true : false;
    }
}
