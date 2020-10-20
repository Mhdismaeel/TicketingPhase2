<?php
namespace App\Actions\TicketPriority;

use App\Models\Ticket_priority;

class StoreNewPriorityAction
{
    public static function execute($inputs)
    {
        $priority=Ticket_priority::create([
            'name'=>$inputs->name
        ]);

        return $priority;

    }

}
