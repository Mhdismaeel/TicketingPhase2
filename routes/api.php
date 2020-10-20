<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth:api'], function() {

    Route::post('userregister', 'UsersController@store')->middleware('check_owner');
    Route::post('StoreProject', 'ProjectController@store')->middleware('check_owner');
    Route::post('StoreType', 'TicketTypeController@store')->middleware('check_owner');
    Route::post('StorePriority', 'TicketPriorityController@store')->middleware('check_owner');
    Route::get('DeleteType/{slug}', 'TicketTypeController@destroy')->middleware('check_owner');
    Route::get('DeletePriority/{slug}', 'TicketPriorityController@destroy')->middleware('check_owner');
    Route::post('UpdateType/{slug}', 'TicketTypeController@update')->middleware('check_owner');
    Route::post('UpdatePriority/{slug}', 'TicketPriorityController@update')->middleware('check_owner');
    //**teams routes */
    Route::get('GetTeams', 'TeamController@index')->middleware('check_owner');
    Route::get('GetTeam/{slug}', 'TeamController@show')->middleware('check_owner');
    Route::get('getusersteam/{teamid}', 'TeamUserController@show')->middleware('check_owner');
    Route::get('GetTeamProject/{slug}', 'TeamController@GetTeamProject')->middleware('check_owner');

});


Route::group(['middleware' => 'auth:api'], function() {
Route::get('deleteBoard/{slug}', 'BoardController@destroy')->middleware('CheckSystemPermission');
Route::get('deleteColumn/{slug}', 'ColumnController@destroy')->middleware('CheckSystemPermission');
Route::get('DeleteProject/{id}', 'ProjectController@destroy')->middleware('CheckSystemPermission');
Route::get('DeleteTicket/{slug}', 'TicketController@destroy')->middleware('CheckSystemPermission');
//********************project*/
Route::get('GetAllProject', 'ProjectController@index');
Route::get('GetProjectBoards/{id}', 'ProjectController@GetProjectBoards')->middleware('CheckSystemPermission');
Route::get('GetProject/{id}', 'ProjectController@show')->middleware('CheckSystemPermission');
Route::post('UpdateProject/{id}', 'ProjectController@update')->middleware('CheckSystemPermission');
//******************board */
Route::post('StoreBoard', 'BoardController@store')->middleware('CheckSystemPermission');
Route::post('UpdateBoard/{slug}', 'BoardController@update')->middleware('CheckSystemPermission');
Route::get('GetBoardDetails/{slug}', 'BoardController@show')->middleware('CheckSystemPermission');
//****************column */
Route::get('GetColumnsBoard/{boaredid}', 'ColumnController@GetColumnsBoard')->middleware('CheckSystemPermission');
Route::post('StoreColumn', 'ColumnController@store')->middleware('CheckSystemPermission');
Route::get('GetColumn/{slug}', 'ColumnController@show')->middleware('CheckSystemPermission');
Route::post('UpdateColumn/{slug}', 'ColumnController@update')->middleware('CheckSystemPermission');
//**********************ticket */
Route::post('StoreTicket', 'TicketController@store')->middleware('CheckSystemPermission');
Route::get('GetTicket/{slug}', 'TicketController@show')->middleware('CheckSystemPermission');
Route::post('UpdateTicket/{slug}', 'TicketController@update')->middleware('CheckSystemPermission');
Route::get('GetAllTicket', 'TicketController@index');
//************************************permissions+user */
Route::post('UpdatePermissions', 'UsersController@AddUserPermissions')->middleware('CheckSystemPermission');
Route::post('UpdateUserRole/{userid}','UsersController@UpdateUserRole')->middleware('CheckSystemPermission');
Route::get('DeleteUser/{userid}','UsersController@destroy')->middleware('CheckSystemPermission');
//************************team */
Route::post('UpdateTeam/{slug}', 'TeamController@update')->middleware('CheckSystemPermission');
Route::get('deleteTeam/{slug}', 'TeamController@destroy')->middleware('CheckSystemPermission');
Route::post('StoreNewTeam', 'TeamController@store')->middleware('CheckSystemPermission');
Route::post('UpdateUserTeam/{teamid}', 'TeamUserController@update')->middleware('CheckSystemPermission');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('GetUserProfilr','UsersController@GetUserProfile');


});

Auth::routes();
Auth::routes(['verify' => true]);
//**************************users routing

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('UserVirification/{email}','UsersController@VerificationUser');

Route::get('GetAllType', 'TicketTypeController@index');
Route::get('GetType/{slug}', 'TicketTypeController@show');
//********************************Ticket Priority */
Route::get('GetAllPriority', 'TicketPriorityController@index');
Route::get('GetPriority/{slug}', 'TicketPriorityController@show');
//*****************//Ticket */

