<?php
namespace App\Actions\Team;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\User;

class DeleteTeamAction
{
    public static function execute($slug)
    {
        $team=Team::FindOrFail($slug);
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
