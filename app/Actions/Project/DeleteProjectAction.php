<?php
namespace App\Actions\Project;

use App\Models\Project;
use App\Models\Column;
use App\Models\User_permission;
use Illuminate\Support\Facades\Auth;
use App\User;
class DeleteProjectAction
{
    public static function execute($id)
    {
        $project=Project::FindOrFail($id);
        $user=User::FindorFail(Auth::id());

        $board=$project->boards();

        $permission=User_permission::where('project_id',$id);
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'project'=>$project,'board'=>$board])
        ->useLog('Project_Log')
        ->log('Delete_Project');


        foreach($board as $b)
        {

       $column=Column::where('board_id',$b->id);

       $column->delete();

        }
        $board->delete();
        $project->delete();
        $permission->delete();

        return true;


    }
}
