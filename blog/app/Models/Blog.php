<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Blog extends Model implements HasMedia
{
    use HasFactory;
        use InteractsWithMedia;
    // protected $table ='blog';

    protected $fillable = [
        'title', 'description', 'image', 'posting_time',
    ];
    protected $hidden = [
        'created_at' , 'updated_at'
    ];

    // public function scopeFilter(Builder $builder, $filters)
    // {
    //     $builder->when($filters['title'] ?? false, function ($builder, $value) {
    //         $builder->where('news.title', 'LIKE', "%{$value}%");
    //     });
    // }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id', 'id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }




    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog_image')->singleFile();

    }
    public function scopeFilter (Builder $builder, $filters)
    {
        $options = array_merge([
            'blog_id' => null,
            'category_id'=>null,
            'tag_id' =>[],

        ] , $filters);
        $builder->when($options['blog_id'],function($builder,$value){
            $builder->where('blog_id',$value);
        });
        $builder->when($options['category_id'],function($builder,$value){
            $builder->where('category_id',$value);
        });
        $builder->when($options['tag_id'],function($builder,$value){

          $builder->whereExists(function($query) use ($value){
            $query ->select(1)
            ->from('blog_tag')
            ->whereRaw('blog_id = blogs.id')
            ->where('tag_id',$value);

          });
        });
    }
    protected static function booted(){
    static::creating(function(Blog $blog){

    $blog->title =Str::title($blog->name);
    
});

    }
}
