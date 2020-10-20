<?php
namespace App\Actions\User;
use App\User;
use Illuminate\Support\Facades\Auth;

class GetUserProfile
{
    public static function execute()
    {
        $userid=Auth::id();

        $user_profile=User::findOrFail($userid);

        return $user_profile;

    }

}
