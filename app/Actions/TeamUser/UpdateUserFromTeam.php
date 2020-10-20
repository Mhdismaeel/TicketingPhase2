<?php
namespace App\Actions\TeamUser;

use App\Models\Team;
use App\Models\Team_User;
use Illuminate\Support\Facades\Auth;
use App\User;
class  UpdateUserFromTeam
{
    public static function execute($input,$teamid)
    {
        $team=Team::FindOrFail($teamid);
        $user=User::FindorFail(Auth::id());

       $team->users()->detach();


        $team->users()->sync($input->user_id);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'teamUser'=>$team->users()->get()])
        ->useLog('TeamUser_Log')
        ->log('UpdateUser_Team');

        return $team->users()->get();

    }


}
