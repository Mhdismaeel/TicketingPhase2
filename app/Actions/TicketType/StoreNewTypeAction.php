<?php
namespace App\Actions\TicketType;
use App\Models\Ticket_type;

class StoreNewTypeAction

{
    public static function execute($inputs)
    {
        $type=Ticket_type::create([

            'name'=>$inputs->name
            ]);

        return $type;

    }



}
