<?php
namespace App\Actions\TicketPriority;

use App\Models\Ticket_priority;

class UpdatePriorityAction
{
    public static function execute($inputs,$slug)
    {
        $priority=Ticket_priority::where('slug',$slug)->FirstOrFail();

        $priority->update([
            'name'=>$inputs->name
        ]);

        return $priority;

    }

}
