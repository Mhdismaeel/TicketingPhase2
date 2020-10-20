<?php
namespace App\Actions\TicketType;
use App\Models\Ticket_type;

class UpdateTypeAction

{
    public static function execute($inputs,$slug)
    {
        $type=Ticket_type::where('slug',$slug)->FiRSTOrFail();

        $type->update([
       'name'=>$inputs->name
        ]);

        return $type;

    }

}
