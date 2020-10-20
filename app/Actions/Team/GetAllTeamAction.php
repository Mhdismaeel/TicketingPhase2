<?php
namespace App\Actions\Team;
use App\Models\Team;
use Spatie\Activitylog\Models\Activity ;
class GetAllTeamAction
{
    public static function execute()
    {

        $team=Team::all();
        return $team;
    }
}
