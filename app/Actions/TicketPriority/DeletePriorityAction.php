<?php
namespace App\Actions\TicketPriority;

use App\Models\Ticket_priority;

class DeletePriorityAction
{
    public static function execute($slug)
    {
        $priority=Ticket_priority::where('slug',$slug)->FirstOrFail();

        $priority->delete();

        return true;

    }

}
