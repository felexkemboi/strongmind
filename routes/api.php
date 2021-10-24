<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Misc\ChannelController;
use App\Http\Controllers\Misc\GroupTypeController;
use App\Http\Controllers\Misc\ProgramTypeController;
use App\Http\Controllers\Misc\StatusController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Programs\ProjectController;
use App\Http\Controllers\Programs\ProgramMemberController;
use App\Http\Controllers\Programs\ProgramMemberTypeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ClientStatusController;
use App\Http\Controllers\ClientNoteController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LeaderShipController;
use App\Http\Controllers\TherapyModeController;
use App\Http\Controllers\Groups\GroupController;
use App\Http\Controllers\SpatiePermissionController;
use App\Http\Controllers\SpatieRoleController;
use App\Http\Controllers\ClientEducationController;
use App\Http\Controllers\ClientMaritalStatusController;
use App\Http\Controllers\ClientPhoneOwnershipController;

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

Route::prefix('country')->group(function () {
    Route::get('all',    [CountryController::class, 'all']);
    Route::get('active', [CountryController::class, 'activeCountries']);
    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::put('update',      [CountryController::class, 'toggleStatus']);
        Route::patch('activate',  [CountryController::class,'activate']);
        Route::patch('deactivate',[CountryController::class,'deactivate']);
    });
});

Route::prefix('timezone')->group(function () {
    Route::get('all',    [TimezoneController::class, 'all']);
    Route::get('active', [TimezoneController::class, 'activeTimezones']);
});

Route::prefix('office')->group(function () {
    Route::get('all',            [OfficeController::class, 'all'])->middleware('auth:sanctum');
    Route::post('create',        [OfficeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [OfficeController::class, 'update'])->middleware('auth:sanctum');
    Route::get('/{id}/members',  [OfficeController::class, 'members'])->middleware('auth:sanctum');
    Route::get('/{id}/programs', [OfficeController::class, 'programs'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [OfficeController::class, 'delete'])->middleware('auth:sanctum');

});
//Updated permissions endpoints(Spatie Laravel Permissions Package)
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('permissions', SpatiePermissionController::class);
    Route::resource('roles',SpatieRoleController::class);
});
//Roles and permissions
Route::prefix('permission')->group(function () {
    Route::get('all',     [PermissionController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [PermissionController::class, 'create'])->middleware('auth:sanctum');
});

Route::prefix('role')->group(function () {
    Route::get('all',            [RoleController::class, 'index'])->middleware('auth:sanctum');
    Route::get('view/{id}',      [RoleController::class, 'showRole'])->middleware('auth:sanctum');
    Route::post('create',        [RoleController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [RoleController::class, 'updateRole'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [RoleController::class, 'deleteRole'])->middleware('auth:sanctum');
});

//Authentication
Route::prefix('auth')->group(function () {
    Route::post('login',             [LoginController::class,'loginUser']);
    Route::get('profile',            [LoginController::class,'profile'])->middleware('auth:sanctum');
    Route::put('profile/update',     [UserController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::put('change-password',    [UserController::class, 'changePassword'])->middleware('auth:sanctum');
    Route::post('profile/set-photo', [UserController::class, 'setPhoto'])->middleware('auth:sanctum');

    //password resets
    Route::group(['prefix' => 'passwords'], function () {
        Route::post('/reset-link', [ResetPasswordController::class, 'index']);
        Route::post('/reset',      [ResetPasswordController::class, 'reset']);
    });
});

//teams
Route::prefix('teams')->group(function () {
    Route::get('all',           [UserController::class, 'index'])->middleware('auth:sanctum');
    Route::get('show/{id}',     [UserController::class, 'showUser'])->middleware('auth:sanctum');
    Route::put('update/{id}',   [UserController::class, 'updateUser'])->middleware('auth:sanctum');
    Route::delete('{id}/delete',[UserController::class,'delete'])->middleware('auth:sanctum');
    Route::post('invite',       [InviteController::class, 'invite'])->middleware('auth:sanctum');
    Route::post('set-password', [InviteController::class, 'setPassword']);
});

//status
Route::prefix('status')->group(function () {
    Route::get('all',            [StatusController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create',        [StatusController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [StatusController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [StatusController::class, 'delete'])->middleware('auth:sanctum');
});

//channels
Route::prefix('channels')->group(function () {
    Route::get('all',            [ChannelController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create',        [ChannelController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [ChannelController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [ChannelController::class, 'delete'])->middleware('auth:sanctum');
});

//group types
Route::prefix('group-types')->group(function () {
    Route::get('all',            [GroupTypeController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create',        [GroupTypeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [GroupTypeController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [GroupTypeController::class, 'delete'])->middleware('auth:sanctum');
});

//program types
Route::prefix('program-types')->group(function () {
    Route::get('all',            [ProgramTypeController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create',        [ProgramTypeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}',    [ProgramTypeController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [ProgramTypeController::class, 'delete'])->middleware('auth:sanctum');
});

//Programs
Route::group(['prefix' => 'projects','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [ProjectController::class,'index']);
    Route::post('/create',       [ProjectController::class,'store']);
    Route::get('/{id}/details',  [ProjectController::class,'show']);
    Route::patch('/{id}/update', [ProjectController::class,'update']);
    Route::delete('/{id}/delete',[ProjectController::class,'destroy']);
    Route::get('/{id}/users',[ProjectController::class,'users']);
    Route::group(['prefix' => 'invite'], function(){
        Route::post('/{id}/send',[ProjectController::class,'sendInvites']);
    });

    //member types
    Route::group(['prefix' => 'member-types'], function(){
        Route::get('/',              [ProgramMemberTypeController::class,'index']);
        Route::post('/create',       [ProgramMemberTypeController::class,'store']);
        Route::get('/{id}/details',  [ProgramMemberTypeController::class,'show']);
        Route::patch('/{id}/update', [ProgramMemberTypeController::class,'update']);
        Route::delete('/{id}/delete',[ProgramMemberTypeController::class,'destroy']);
    });

    //Program Members
    Route::get('/{id}/members',             [ProgramMemberController::class,'index']);
    Route::post('/{id}/new-members',        [ProgramMemberController::class,'store']);
    Route::post('/{id}/revoke-membership',  [ProgramMemberController::class,'removeMember']);
    Route::post('/{id}/activate-membership',[ProgramMemberController::class,'activateMember']);
});

//clients
Route::group(['prefix' => 'clients','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',                 [ClientController::class,'index']);
    Route::post('create',              [ClientController::class,'create']);
    Route::get('/{id}/details',        [ClientController::class,'show']);
    Route::post('/therapy/activate',   [ClientController::class,'activate']);
    Route::patch('/{id}/update',       [ClientController::class,'update']);
    Route::patch('/{id}/transfer',     [ClientController::class,'transfer']);
    Route::patch('/bulk-edit',         [ClientController::class,'bulkEdit']);
    Route::get('/{id}/activity',       [ClientController::class,'clientLogs']);
    Route::patch('/{id}/change',       [ClientController::class,'changeChannel']);

    //client notes
    Route::post('/{id}/notes/create',  [ClientNoteController::class,'create']);
    Route::get('/{id}/notes/public',   [ClientNoteController::class,'getPublicNotes']);
    Route::get('/{id}/notes/private',  [ClientNoteController::class,'getPrivateNotes']);
    Route::put('/notes/{id}/update',   [ClientNoteController::class,'edit']);
    Route::delete('/notes/{id}/delete',[ClientNoteController::class,'destroy']);

    //extra client bio-data endpoints
    Route::get('/education/all',[ClientEducationController::class,'__invoke']);
    Route::get('/marital_statuses/all',[ClientMaritalStatusController::class,'__invoke']);
    Route::get('/phone_ownerships/all',[ClientPhoneOwnershipController::class,'__invoke']);
});

//Languages
Route::group(['prefix' => 'languages','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [LanguageController::class, 'index']);
    Route::post('/create',       [LanguageController::class, 'create']);
    Route::put('{id}/update',    [LanguageController::class, 'update']);
    Route::delete('{id}/delete', [LanguageController::class, 'destroy']);
});

//Groups
Route::group(['middleware' => 'auth:sanctum','prefix' => 'groups'], function(){
    Route::post('/create',[GroupController::class,'store']);
    Route::get('/',[GroupController::class,'index']);
    Route::get('/{id}',[GroupController::class,'show']);
    Route::patch('/{id}/update',[GroupController::class,'update']);
    Route::delete('/{id}/delete',[GroupController::class,'destroy']);
});

//LeaderShip
Route::group(['prefix' => 'leadership','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [LeaderShipController::class, 'index']);
    Route::post('/create',       [LeaderShipController::class, 'create']);
    Route::put('{id}/update',    [LeaderShipController::class, 'update']);
    Route::delete('{id}/delete', [LeaderShipController::class, 'destroy']);
});

//ClientStatus
Route::group(['prefix' => 'client-status' , 'middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [ClientStatusController::class, 'index']);
    Route::post('/create',       [ClientStatusController::class, 'create']);
    Route::put('{id}/update',    [ClientStatusController::class, 'update']);
    Route::delete('{id}/delete', [ClientStatusController::class, 'destroy']);
});

//LeaderShip
Route::group(['prefix' => 'leadership','middleware' => 'auth:sanctum'], function() {
    Route::get('/all', [LeaderShipController::class, 'index']);
    Route::post('/create', [LeaderShipController::class, 'create']);
    Route::put('{id}/update', [LeaderShipController::class, 'update']);
    Route::delete('{id}/delete', [LeaderShipController::class, 'destroy']);
});
//TherapyMode
Route::group(['prefix' => 'therapy-mode', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [TherapyModeController::class, 'index']);
    Route::post('/create',       [TherapyModeController::class, 'create']);
    Route::put('{id}/update',    [TherapyModeController::class, 'update']);
    Route::delete('{id}/delete', [TherapyModeController::class, 'destroy']);
});


//Cycle
Route::group(['prefix' => 'cycle','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [CycleController::class, 'index']);
    Route::post('/create',       [CycleController::class, 'create']);
    Route::put('{id}/update',    [CycleController::class, 'update']);
    Route::delete('{id}/delete', [CycleController::class, 'destroy']);
});

//GroupType
Route::group(['prefix' => 'group-type','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',           [GroupTypeController::class, 'index']);
    Route::post('/create',       [GroupTypeController::class, 'create']);
    Route::put('{id}/update',    [GroupTypeController::class, 'update']);
    Route::delete('{id}/delete', [GroupTypeController::class, 'destroy']);
});
