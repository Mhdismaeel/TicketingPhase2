<?php
namespace App\Actions\Project;

use App\Models\Project;
use App\Models\User_permission;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Permission;
class StoreNewProjectAction
{
    public static function execute($inputs)
    {
        $userid=auth::id();

        $user=User::FindOrFail($userid);

        $permission=Permission::all();

        if($inputs->team_id==null)
        {
           $project=Project::create([
            'title'=>$inputs->title,
            'description'=>$inputs->description,
            'team_id'=>'1'
        ]);

        }
        else
        {
            $project=Project::create([
                'title'=>$inputs->title,
                'description'=>$inputs->description,
                'team_id'=>$inputs->team_id
            ]);

        }

        //create role permission for this project

        foreach($permission as $p)
        {
            $userpermission=User_permission::create(['user_name'=>$user->email,'role_name'=>'team_leader','permission_name'=>$p->name,'project_id'=>$project->id]);

        }

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'project'=>$project])
        ->useLog('Project_Log')
        ->log('Store_Project');

        return $project;


    }
}
