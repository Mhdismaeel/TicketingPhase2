<?php
namespace App\Actions\Team;
use App\Models\Team;

class GetTeamProjectsAction
{
    public static function execute($slug)
    {
       $team=Team::where('slug',$slug)->FirstOrFail();

        return $team->projects;
    }
}
