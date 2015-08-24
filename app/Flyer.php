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
     * Find the flyer at the given address...
     * @param string $zip
     * @param string $street
     * @return Builder mixed
     */
    public static function LocatedAt($zip, $street)
    {
        $street = str_replace("-", " ", $street);
        return static::where(compact('zip', 'street'))->firstOrFail();
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

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * a Flyer belongs to a user...
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Determine if flyer was created by the $user
     * @param User $user
     * @return bool
     */
    public function ownedBy(User $user)
    {
        return ($user->id == $this->user_id);
    }
}
