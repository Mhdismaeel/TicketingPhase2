<?php
namespace App\Actions\TeamUser;

use App\Models\Team;
use App\Models\Team_User;
use Illuminate\Support\Facades\Auth;
use App\User;
class  DeleteTeam
{
    public static function execute($teamid)
    {
        $team=Team::FindOrFail($teamid);
        $user=User::FindorFail(Auth::id());
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'team'=>$team])
        ->useLog('Team_Log')
        ->log('Delete_Team');
        $team->users()->detach();
        $team->delete();

        return true;





    }


}
