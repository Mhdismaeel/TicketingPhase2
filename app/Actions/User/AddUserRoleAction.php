<?php
namespace App\Actions\User;
use App\Models\Role;
use App\User;
use App\Http\Requests\UserRole\UpdateUserRoleRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User_permission;
use Illuminate\Support\Facades\Auth;

class AddUserRoleAction
{
    public static function execute($inputs,$userid)
    {
        $user=User::FindOrFail($userid);
        $loguser=User::FindorFail(auth::id());

        $user->update([
            'name'=>$inputs->name,
            'email'=>$inputs->email,
            'role_id'=>$inputs->role_id,
            'password' => Hash::make($inputs->password),
        ]
        );

        activity()
        ->causedBy($user)
        ->withProperties(['user' =>$loguser->email,'Register'=>$user])
        ->useLog('UserLog')
        ->log('UpdateUser');

    $permissions=User_permission::where('user_name',$inputs->email);

    $permissions->delete();

        return $user;

    }

    }

