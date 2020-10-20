<?php
namespace App\Actions\User;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User_permission;
use PhpParser\Node\Stmt\Return_;
use App\Models\Role;
class AdduseerPermission

{
    public static function execute($inputs)
    {
        $userid=Auth::id();
        $user=User::FindorFail($userid);

        $userto=User::where('email',$inputs->user_email)->FirstOrFail();

        $roleto=Role::FindOrFail($userto->role_id);

        if($user->role_id==2 && strtoupper($roleto->name)=='OWNER')
        {
            return false;

        }

        $userpermission=User_permission::where('user_name',$inputs->user_email)->
        where('project_id',$inputs->project_id);



         $userpermission->delete();





        foreach($inputs->permission_name as $p)
        {
            $permissions=User_permission::create([
                'user_name'=>$inputs->user_email,
                'role_name'=>$roleto->name,
                'permission_name'=>$p,
                'project_id'=>$inputs->project_id,
            ]);

        }
        //logout

        if ($userto) {
            $userto->api_token = null;
            $userto->save();
        }

        return $permissions;

    }

}

