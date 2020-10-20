<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected  $fillable=['name'];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    public function user_permissions()
    {
        return $this->hasMany('App\Models\User_permission');
    }


}
