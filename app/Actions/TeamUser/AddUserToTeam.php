<?php
namespace App\Actions\TeamUser;

use App\Models\Team;
use App\Models\Team_User;
use Illuminate\Support\Facades\Auth;
use App\User;
class  AddUserToTeam
{
    public static function execute($input)
    {
        $team=Team::FindOrFail($input->team_id);
        $user=User::FindorFail(Auth::id());
        $team->users()->sync($input->user_id);
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'team_user'=>$team->users()->get()])
        ->useLog('TeamUser_Log')
        ->log('AddUser_Team');

        return $team->users()->get();


    }


}
