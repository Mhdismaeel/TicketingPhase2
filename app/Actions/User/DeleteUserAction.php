<?php
namespace App\Actions\User;
use App\User;
use App\Models\User_permission;

class DeleteUserAction
{
    public static function execute($userid)
    {
        $user=User::FindOrFail($userid);

        $user->teams()->detach();

        $permissions=User_permission::where('user_name',$user->email);

        $permissions->delete();

        $user->delete();


        return true;

    }
}
