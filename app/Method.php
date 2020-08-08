<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Method extends Model
{
    const TYPES = ['GET', 'POST', 'PUT', 'DELETE'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id',
        'name',
        'type',
        'description',
        'return_type_id',
        'payload',
        'response',
        'visible',
        'is_array_returned',
    ];

    /**
     * Get the tag record associated with the method.
     */
    public function tag()
    {
        return $this->belongsTo('App\MethodTag');
    }

    /**
     * Get the returnType record associated with the method.
     */
    public function returnType()
    {
        return $this->hasOne('App\Type', 'id', 'return_type_id');
    }

    /**
     * Get the params for the type.
     */
    public function params()
    {
        return $this->hasMany('App\MethodParam', 'method_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function errors()
    {
        return $this->belongsToMany('App\Error');
    }

    /**
     * Formats the name and replaces '/' symbols to '.'
     */
    public function formatName()
    {
        return rtrim(ltrim(str_replace('/', '.', $this->name), '.'), '.');
    }

    /**
     * Reverse format of the name and replaces '.' symbols to '/'
     */
    public static function unformatName($name)
    {
        return '/' . str_replace('.', '/', $name);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function isArrayReturned()
    {
        return $this->is_array_returned;
    }
}
