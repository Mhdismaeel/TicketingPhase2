<?php
namespace App\Actions\Board;
use App\Models\Board;
use App\User;
use Illuminate\Support\Facades\Auth;
class UpdateBoardsAction
{
    public static function execute($inputs,$slug)
    {
        $board=Board::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());

        $board->update([
            'title'=>$inputs->title,
            'description'=>$inputs->description,
            'project_id'=>$inputs->project_id
        ]);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Board'=>$board])
        ->useLog('Board_Log')
        ->log('Update_Board');

        return $board;

    }

}
