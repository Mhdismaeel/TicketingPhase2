<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Board extends Model
{
    use HasSlug;

    protected $fillable=['title','description','project_id'];

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

    public  function projects()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public  function columns()
    {
        return $this->hasMany('App\Models\Column');
    }

}
