<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class GetAllTicketsAction
{

    public static function execute()
    {
        $userid=Auth::id();

        $ticket=Ticket::where('assign_id',$userid)->get();
        return $ticket;

    }

}
