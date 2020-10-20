<?php
namespace App\Actions\Board;
use App\Models\Board;

class GetBoardDetailAction
{
    public static function execute($slug)
    {
        $board=Board::where('slug',$slug)->FirstOrFail();

        return $board;

    }

}
