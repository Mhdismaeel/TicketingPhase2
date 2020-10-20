<?php
namespace App\Actions\TicketPriority;

use App\Models\Ticket_priority;

class GetAllPriorityAction
{
    public static function execute()
    {
        $priority=Ticket_priority::all();

        return $priority;

    }

}
