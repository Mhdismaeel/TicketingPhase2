<?php
namespace App\Actions\TicketPriority;

use App\Models\Ticket_priority;

class GetPriorityDetailAction
{
    public static function execute($slug)
    {
        $priority=Ticket_priority::where('slug',$slug)->FirstOrFail();

        return $priority;

    }

}
