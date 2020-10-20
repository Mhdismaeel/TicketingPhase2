<?php
namespace App\Actions\Column;

use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use App\User;
class UpdateColumnAction
{
    public static function execute($inputs,$slug)
    {
        $column=Column::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());

        $column->update([
            'title'=>$inputs->title,
            'board_id'=>$inputs->board_id

        ]);
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Column'=>$column])
        ->useLog('Column_Log')
        ->log('Update_Column');

        return $column;


    }
}
