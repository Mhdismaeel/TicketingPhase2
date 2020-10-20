<?php
namespace App\Actions\Team;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\User;
class UpdateTeamAction
{
    public static function execute($inputs,$slug)
    {
        $team=Team::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());

        $team->update([
            'name'=>$inputs->name,
            'description'=>$inputs->description
        ]);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'team'=>$team])
        ->useLog('Team_Log')
        ->log('Update_Team');

        return $team;


    }


}
