<?php
namespace App\Actions\Project;
use App\Models\Board;

class GetProjectBoardAction
{
    public static function execute($id)
    {
        $board=Board::where('project_id',$id)->get();

        return $board;

    }

}
