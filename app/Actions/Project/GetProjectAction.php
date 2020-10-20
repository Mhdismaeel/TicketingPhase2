<?php
namespace App\Actions\Project;

use App\Models\Project;

class GetProjectAction
{
    public static function execute($id)
    {
        $project=Project::FindOrFail($id);

        return $project;


    }
}
