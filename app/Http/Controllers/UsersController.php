<?php

namespace App\Http\Controllers;

use App\Actions\User\GetUserProfile;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
use App\Http\Requests\UserRole\UpdateUserRoleRequest;
use App\Actions\User\AddUserRoleAction;
use App\Actions\User\AdduseerPermission;
use App\Actions\User\VerificationUserAction;
use App\Actions\User\StoreNewUserAction;
use App\Actions\User\DeleteUserAction;
use App\Http\Requests\UserRole\StoreUserRequest;
use App\Http\Requests\UserRole\StoreUserPernissionRequest;

class UsersController extends Controller
{



   public function GetUserProfile()
   {
      $response=GetUserProfile::execute();
      if($response)
      {
          return Success::execute('Record(s) fetched successfully',$response,2000);

      }
      else
      {
        return Fail::execute('Record(s) can not be fetched',$response,3000);

      }

   }




   public function UpdateUserRole(UpdateUserRoleRequest $requset,$userid)
   {
       $response=AddUserRoleAction::execute($requset,$userid);

       if ($response)
       {
           return Success::execute('Record Updated',$response,2002);

       }
       else
       {
        return Fail::execute('Record can not be updated',$response,3002);

       }

   }



    public function VerificationUser($mail)
    {
        $response=VerificationUserAction::execute($mail);
        if($response)
        {
            //return Success::execute('User_Verified',$response);

            return redirect('https://testing.testhis.link/');

        }
        else
        {
            return Fail::execute('User_Verified_error',$response);

        }
    }

    public function store(StoreUserRequest $request)
    {

        $response=StoreNewUserAction::execute($request);
        if($response)
        {
            return Success::execute('Record Created',$response,2001);

        }
        else
        {
            return Fail::execute('Record can not be created',$response,3001);

        }
    }

    public function AddUserPermissions(StoreUserPernissionRequest $request)
    {
        $response=AdduseerPermission::execute($request);

       if ($response)
       {
           return Success::execute('Record Updated',$response,2002);

       }
       else
       {
        return Fail::execute('Record can not be updated',$response,3002);

       }

    }

    public function destroy($userid)
    {
        $response=DeleteUserAction::execute($userid);

        if($response)
        {
            return Success::execute('Record Deleted',$response,2003);

        }
        else
        {
            return Fail::execute('Record can not be deleted',$response,3003);

        }
    }



}
