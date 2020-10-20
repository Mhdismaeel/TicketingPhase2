<?php
namespace App\Actions\TicketType;
use App\Models\Ticket_type;

class DeleteTypeAction

{
    public static function execute($slug)
    {
        $type=Ticket_type::where('slug',$slug)->FiRSTOrFail();

        $type->delete();

        return true;

    }



}
