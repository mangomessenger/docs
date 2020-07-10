<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'description',
    ];

    /**
     * Get the methods for the tag.
     */
    public function methods()
    {
        return $this->hasMany('App\Method', 'tag_id');
    }
}
