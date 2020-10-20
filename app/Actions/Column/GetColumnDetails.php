<?php
namespace App\Actions\Column;

use App\Models\Column;

class GetColumnDetails
{
    public static function execute($slug)
    {
        $Column=Column::where('slug',$slug)->FirstOrFail();
        return $Column;

    }
}
