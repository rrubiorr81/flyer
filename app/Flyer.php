<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    /**
     * fillable fields for a Flyer
     * @var array
     */
    protected $fillable = [
        'state',
        'country',
        'city',
        'description',
        'zip',
        'price',
        'street'
    ];
    /**
     * a Flyer has many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
