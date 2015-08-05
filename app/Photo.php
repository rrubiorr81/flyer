<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "flyer_photo";

    protected $fillable = ['photo'];

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
}
