<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;

class GetTicketDetailsAction
{

    public static function execute($slug)
    {
        $ticket=Ticket::where('slug',$slug)->FirstOrFail();
        return $ticket;

    }

}
