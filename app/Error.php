<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'type', 'message',
    ];

    /**
     * Get the tag record associated with the method.
     */
    public function category()
    {
        return $this->belongsTo('App\ErrorCategory');
    }
}
