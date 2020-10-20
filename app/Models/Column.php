<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Column extends Model
{
    use HasSlug;

    protected $fillable=['title','board_id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relations
    public  function boards()
    {
        return $this->belongsTo('App\Models\Board');
    }

    public  function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

}
