<?php
namespace App\Actions\User;

use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use App\Models\User_permission;

class StoreNewUserAction
{
    use HasRoles;

    public static function execute($inputs)
    {
        $loguser=User::FindorFail(auth::id());

        if($inputs->role_id==2)
        {
        User_permission::create(['user_name'=>$inputs->email,'role_name'=>'team_leader','permission_name'=>'Can create teams','project_id '=>'0']);
        User_permission::create(['user_name'=>$inputs->email,'role_name'=>'team_leader','permission_name'=>'Can update teams','project_id '=>'0']);
        User_permission::create(['user_name'=>$inputs->email,'role_name'=>'team_leader','permission_name'=>'Can delete teams','project_id '=>'0']);
        User_permission::create(['user_name'=>$inputs->email,'role_name'=>'owner','permission_name'=>'Can update users','project_id'=>'0']);

        }

            $user= User::create([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => Hash::make($inputs['password']),
                'role_id'=>$inputs['role_id']
            ]);

           $user->generateToken();

           activity()
        ->causedBy($user)
        ->withProperties(['user' =>$loguser->email,'Register'=>$user])
        ->useLog('UserLog')
        ->log('Register');

            return $user;

        }





}
