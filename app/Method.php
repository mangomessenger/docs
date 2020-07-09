<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Method extends Model
{
    use SoftDeletes;

    static public $types = [ 'GET', 'POST', 'PUT', 'DELETE'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id', 'name', 'type', 'description', 'return_type_id',
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
}
