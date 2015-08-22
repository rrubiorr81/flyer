<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

class Photo extends Model
{
    protected $table = "flyer_photo";

    protected $fillable = ['path', 'name', 'tumbnail_path'];

    protected $basePath = "flyer/photo";

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->basePath, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->basePath, $this->name);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->basePath, $this->name);

        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);

        return $this;
    }
}
