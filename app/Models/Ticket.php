<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Ticket extends Model
{
    use HasSlug;

    protected $fillable=['title','content','reporter_id',
    'assign_id','board_id','type_id','priority_id','column_id','parent_id'];

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

    public  function columns()
    {
        return $this->belongsTo('App\Models\Column');
    }


    public  function ticket_types()
    {
        return $this->belongsTo('App\Models\Ticket_type');
    }

    public  function Ticket_prioritys()
    {
        return $this->belongsTo('App\Models\Ticket_priority');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket','parentid');

    }

    public  function users()
    {
        return $this->belongsTo('App\User');
    }


}
