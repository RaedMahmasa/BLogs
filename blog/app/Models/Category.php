<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $timestamps = false;

    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_image')->singleFile();

    }
}
