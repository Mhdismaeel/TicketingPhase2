<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\User;

class StoreNewTicketAction
{


    public static function execute($inputs)
    {
        $userid=Auth::id();
        $user=User::FindOrFail($userid);

        $ticket=Ticket::create([
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

        activity()
        ->causedBy($user)
        ->withProperties(['user'=>$user->email,'ticket'=>$ticket])
        ->useLog('Ticket_Log')
        ->log('Store_Ticket');

        return $ticket;

    }

}
