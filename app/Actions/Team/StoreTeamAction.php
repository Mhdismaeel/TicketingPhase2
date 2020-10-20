<?php
namespace App\Actions\Team;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\User;
class StoreTeamAction
{
    public static function execute($inputs)
    {
        $user=User::FindorFail(Auth::id());

        $team= Team::create([
            'name'=>$inputs->name,
            'description'=>$inputs->description
        ]);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'team'=>$team])
        ->useLog('Team_Log')
        ->log('Store_Team');

        return $team;

    }

}
