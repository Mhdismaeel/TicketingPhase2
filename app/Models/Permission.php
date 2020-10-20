<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function user_permissions()
    {
        return $this->hasMany('App\Models\User_permission');
    }

}
