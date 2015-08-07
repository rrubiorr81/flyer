<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "course";
    protected $fillable = ["name", "created_at", "updated_at"];

    public function students()
    {
        $this->hasMany('App\Student');
    }
}
