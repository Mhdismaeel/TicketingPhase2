<?php
namespace App\Actions\Column;

use App\Models\Column;

class GetAllColumnBoardAction
{
    public static function execute($boaredid)
    {

        $Column=Column::where('board_id',$boaredid)->get();
        return $Column;

    }
}
