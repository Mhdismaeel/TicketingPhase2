<?php
namespace App\Actions\Board;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use App\User;
class DeleteProjectBoardAction
{
    public static function execute($slug)
    {
        $user=User::FindorFail(Auth::id());
        $board=Board::where('slug',$slug)->FirstOrFail();
        $column=$board->columns();
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Board'=>$board,'Column'=>$column])
        ->useLog('Board_Log')
        ->log('Delete_Board');

        $column->delete();
        $board->delete();

        return true;

    }

}
