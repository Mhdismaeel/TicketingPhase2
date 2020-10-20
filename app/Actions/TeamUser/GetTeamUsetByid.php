<?php
namespace App\Actions\TeamUser;

use App\Models\Team;
use App\user;
use App\Models\Team_User;

class  GetTeamUsetByid
{
    public static function execute($teamid)
    {
        $team=Team::FindOrFail($teamid);

        $user=User::join('team_user','users.id','=','team_user.user_id')
        ->select('users.id','users.name','users.email')->where('team_user.team_id',$teamid)
        ->get();

        return $user;


    }


}
