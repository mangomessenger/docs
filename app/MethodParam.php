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
        'name', 'description', 'method_id', 'return_type_id', 'is_required', 'is_array'
    ];

    /**
     * Get the Type record associated with the MethodParam.
     */
    public function returnType()
    {
        return $this->hasOne('App\Type', 'id', 'return_type_id');
    }

    protected $casts = [
        'is_required' => 'boolean',
        'is_array' => 'boolean',
    ];

    public function isRequiredNamed()
    {
        return $this->is_required ? 'Yes' : 'No';
    }

    public function isRequired()
    {
        return $this->is_required ? true : false;
    }

    public function isArray()
    {
        return $this->is_array ? true : false;
    }
}
