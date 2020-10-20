<?php
namespace App\Actions\Column;

use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use App\User;
class DeleteColumnAction
{
    public static function execute($slug)
    {
        $Column=Column::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Column'=>$Column])
        ->useLog('Column_Log')
        ->log('Delete_Column');
        $Column->delete();
        return true;

    }
}
