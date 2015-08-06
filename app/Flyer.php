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
     * @param Builder $query
     * @param string $zip
     * @param string $street
     * @return Builder mixed
     */
    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace("-", " ", $street);
        return $query->where(compact('zip', 'street'))->first();
    }

    public function getPriceAttribute($price)
    {
        return number_format($price);
    }

    /**
     * a Flyer has many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
