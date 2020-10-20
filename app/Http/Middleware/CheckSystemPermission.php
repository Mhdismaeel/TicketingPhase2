<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\User_permission;
use App\Models\Column;
use App\Models\Ticket;
use App\Models\Board;
use Illuminate\Support\Str;
class CheckSystemPermission extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

     public function handle($request, Closure $next, ...$guards)
     {
        if (Auth::check())
        {
            $userid=Auth::id();
            $user=User::FindOrfail($userid);
            $Ifteam = Str::contains($request->ActionType, 'teams');
            $Ifuser = Str::contains($request->ActionType, 'users');
            $Ifpermission = Str::contains($request->ActionType, 'permissions');
            $Ifproject = Str::contains($request->ActionType, 'projects');
            $Ifboard = Str::contains($request->ActionType, 'boards');
            $Ifcolumn = Str::contains($request->ActionType, 'columns');
            $Ifticket = Str::contains($request->ActionType, 'tickets');
            $Ifstoreboard=Str::contains($request->ActionType, 'create boards');
            $Ifstorecolumn=Str::contains($request->ActionType, 'create columns');
            $Ifstoreticket=Str::contains($request->ActionType, 'create tickets');

            if($user->role_id==1 || $user->role_id==2 || $user->role_id==3)
            {
                if($Ifteam)
                {
                    $permission=User_permission::where('user_name',$user->email)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }

                }

                if($Ifuser)
                {
                    $permission=User_permission::where('user_name',$user->email)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }

                }

                if($Ifpermission)
                {
                    $permission=User_permission::where('user_name',$user->email)->
                    where('project_id',$request->project_id)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }

                }

                if($Ifstoreboard)
                {
                    $permission=User_permission::where('user_name',$user->email)->
                    where('project_id',$request->project_id)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }

                }
                elseif($Ifstorecolumn)
                {
                    $board=Board::where('id',$request->board_id)->FirstOrFail();

                    $permission=User_permission::where('user_name',$user->email)->
                    where('project_id',$board->project_id)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }

                }

                elseif($Ifstoreticket)
                {
                    $board=Board::where('id',$request->board_id)->FirstOrFail();
                    $permission=User_permission::where('user_name',$user->email)->
                    where('project_id',$board->project_id)->
                    select('permission_name')->get();

                    foreach($permission as $x)
                    {
                       if($x['permission_name']==$request->ActionType)
                       {
                        return $next($request);

                       }

                    }}



                elseif($Ifboard)
                {
                    if($request->ActionType=='Can fetch columns')
                    {
                    $board=Board::where('id',$request->id)->FirstOrFail();

                    }

                 $board=Board::where('slug',$request->slug)->FirstOrFail();

                $permission=User_permission::where('user_name',$user->email)->
                where('project_id',$board->project_id)->
                select('permission_name')->get();

                foreach($permission as $x)
                {
                   if($x['permission_name']==$request->ActionType)
                   {
                    return $next($request);

                   }

                }

            }

            elseif($Ifcolumn)
            {
                $column=Column::where('slug',$request->slug)->FirstOrFail();
                $board=Board::FindOrFail($column->board_id);

                $permission=User_permission::where('user_name',$user->email)->
                where('project_id',$board->project_id)->
                select('permission_name')->get();

                foreach($permission as $x)
                {
                   if($x['permission_name']==$request->ActionType)
                   {
                    return $next($request);

                   }

                }

            }

            elseif($Ifticket)
            {
                $ticket=Ticket::where('slug',$request->slug)->FirstOrFail();
                $column=Column::FindOrFail($ticket->column_id);
                $board=Board::FindOrFail($column->board_id);

                $permission=User_permission::where('user_name',$user->email)->
                where('project_id',$board->project_id)->
                select('permission_name')->get();

                foreach($permission as $x)
                {
                   if($x['permission_name']==$request->ActionType)
                   {
                    return $next($request);

                   }

                }
            }

            elseif($Ifproject)
            {
                $permission=User_permission::where('user_name',$user->email)->
                where('project_id',$request->id)->
                select('permission_name')->get();

                foreach($permission as $x)
                {
                   if($x['permission_name']==$request->ActionType)
                   {
                    return $next($request);

                   }

                }
            }



           }

        }

       return response()->json(['error' => 'Not have Permissions'], 401);

     }


}
