<?php

namespace App\Http\Controllers;

use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreNewProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Actions\Project\UpdateProjectAction;
use App\Actions\Project\GetAllProjectAction;
use App\Actions\Project\GetProjectAction;
use App\Actions\Project\DeleteProjectAction;
use App\Actions\Project\StoreNewProjectAction;
use App\Actions\Project\GetProjectBoardAction;

class ProjectController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetAllProjectAction::execute();

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
    public function store(StoreNewProjectRequest $request)
    {
        $response=StoreNewProjectAction::execute($request);

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
    public function show($id)
    {
        $response=GetProjectAction::execute($id);

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
    public function update(UpdateProjectRequest $request, $id)
    {
        $response=UpdateProjectAction::execute($request,$id);

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
    public function destroy($id)
    {
        $response=DeleteProjectAction::execute($id);

        if($response)
        {
            return Success::execute('Record Deleted',$response,2003);

        }
        else
        {
            return Fail::execute('Record can not be deleted',$response,3003);

        }


    }

    public function GetProjectBoards($id)
    {

        $response=GetProjectBoardAction::execute($id);

        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }

    }
}
