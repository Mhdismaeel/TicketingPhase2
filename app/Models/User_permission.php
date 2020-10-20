<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_permission extends Model
{
    use HasFactory;

    protected  $fillable=['user_name','role_name','permission_name','project_id'];

   /* public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function permissions()
    {
        return $this->belongsTo('App\Models\Permission');
    }


    public function roles()
    {
        return $this->belongsTo('App\Models\Role');
    }


    public function projects()
    {
        return $this->belongsTo('App\Models\Project');
    }*/


}
