<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\SendEmail;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class JobController extends Controller
{

/**
 *
 *
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Symfony\Component\HttpKernel\Exception\HttpException
 */
public function enqueue(Request $request)
{
    $details = ['email' => 'mohamadismaeel111@outlook.com'];
    SendEmail::dispatch($details);
}

}
