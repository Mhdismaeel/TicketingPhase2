<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamUser\StoreUserTeam;
use App\Http\Requests\TeamUser\UpdateTeamUserRequest;
use App\Models\Team_User;
use App\Actions\Helper\Success;
use App\Actions\Helper\Fail;
Use App\Actions\TeamUser\AddUserToTeam;
Use App\Actions\TeamUser\UpdateUserFromTeam;
Use App\Actions\TeamUser\GetTeamUsetByid;
Use App\Actions\TeamUser\DeleteTeam;

class TeamUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTeam $request)
    {
        $response=AddUserToTeam::execute($request);
        if($response)
        {
            return Success::execute('Record Created',$response,2001);

        }
        else
        {
            return Fail::execute('Record can not be created',$response,3001);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($teamid)
    {
        $response=GetTeamUsetByid::execute($teamid);
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamUserRequest $request, $teamid)
    {
        $response=UpdateUserFromTeam::execute($request,$teamid);

        if($response)
        {
            return Success::execute('Record Updated',$response,2002);

        }
        else
        {
            return Fail::execute('Record can not be updated',$response,3002);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($teamid)
    {
        $response=DeleteTeam::execute($teamid);

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
