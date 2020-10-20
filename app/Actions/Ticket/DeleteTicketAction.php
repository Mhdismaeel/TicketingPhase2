<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;

class DeleteTicketAction
{

    public static function execute($id)
    {
        $ticket=Ticket::where('slug',$id)->FirstOrFail();

        $ticket->delete();

        return true;

    }

}
