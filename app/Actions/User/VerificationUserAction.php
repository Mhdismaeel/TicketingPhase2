<?php
namespace App\Actions\User;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class VerificationUserAction
{
    public static function execute($mail)

    {
        $user=User::where('email',$mail)->first();


        if($user!=null)
        {

            $user->email_verified_at=Carbon::now();
            $user->save();

            return $user;

        }




    }




}
