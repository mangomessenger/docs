<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Get the full name of category '$CODE $NAME'
     */
    public function fullName()
    {
        return "{$this->code} {$this->name}";
    }

    /**
     * Get the errors for the error category.
     */
    public function errors()
    {
        return $this->hasMany('App\Error', 'category_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('code', function (Builder $builder) {
            $builder->orderBy('code');
        });
    }
}
