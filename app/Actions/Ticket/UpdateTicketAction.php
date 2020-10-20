<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class UpdateTicketAction
{

    public static function execute($inputs,$slug)
    {
        $ticket=Ticket::where('slug',$slug)->FirstOrFail();
        $userid=Auth::id();

        $ticket->update([

            'title'=>$inputs->title,
            'content'=>$inputs->content,
            'reporter_id'=>$userid,
            'assign_id'=>$inputs->assign_id,
            'board_id'=>$inputs->board_id,
            'type_id'=>$inputs->type_id,
            'priority_id'=>$inputs->priority_id,
            'column_id'=>$inputs->column_id,
            'parent_id'=>$inputs->parent_id

        ]);

        return $ticket;

    }

}
