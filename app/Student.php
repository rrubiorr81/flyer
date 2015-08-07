<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    protected $fillable = ["name", "created_at", "updated_at"];

    public function courses()
    {
        $this->hasMany('App\Course');
    }
}
