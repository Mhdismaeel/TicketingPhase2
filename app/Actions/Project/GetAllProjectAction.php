<?php
namespace App\Actions\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User_permission;
use App\User;
class GetAllProjectAction
{
    public static function execute()
    {
        $userid=Auth::id();
        $user=User::FindOrFail($userid);
        $projectid=User_permission::where('user_name',$user->email)->
        select('project_id')->distinct()->get();
        $project=Project::whereIn('id',$projectid)->get();


        return $project;


    }
}
