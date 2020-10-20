<?php
namespace App\Actions\TicketType;
use App\Models\Ticket_type;

class GetAllTicketTypeAction

{
    public static function execute()
    {
        $type=Ticket_type::all();

        return $type;

    }



}
