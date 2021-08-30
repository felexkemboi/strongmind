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
use App\Http\Controllers\Programs\ProgramController;
use App\Http\Controllers\Programs\ProgramMemberController;
use App\Http\Controllers\Programs\ProgramMemberTypeController;
use App\Http\Controllers\ClientController;
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
    Route::get('all', [CountryController::class, 'all']);
    Route::get('active', [CountryController::class, 'activeCountries']);
    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::put('update', [CountryController::class, 'toggleStatus']);
        Route::patch('activate',[CountryController::class,'activate']);
        Route::patch('deactivate',[CountryController::class,'deactivate']);
    });
});
Route::prefix('timezone')->group(function () {
    Route::get('all', [TimezoneController::class, 'all']);
    Route::get('active', [TimezoneController::class, 'activeTimezones']);
});
Route::prefix('office')->group(function () {
    Route::get('all', [OfficeController::class, 'all'])->middleware('auth:sanctum');
    Route::post('create', [OfficeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [OfficeController::class, 'update'])->middleware('auth:sanctum');
    Route::get('/{id}/members', [OfficeController::class, 'members'])->middleware('auth:sanctum');
    Route::get('/{id}/programs', [OfficeController::class, 'programs'])->middleware('auth:sanctum');

});
//Roles and permissions
Route::prefix('permission')->group(function () {
    Route::get('all', [PermissionController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [PermissionController::class, 'create'])->middleware('auth:sanctum');
});
Route::prefix('role')->group(function () {
    Route::get('all', [RoleController::class, 'index'])->middleware('auth:sanctum');
    Route::get('view/{id}', [RoleController::class, 'showRole'])->middleware('auth:sanctum');
    Route::post('create', [RoleController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [RoleController::class, 'updateRole'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [RoleController::class, 'deleteRole'])->middleware('auth:sanctum');
});
//Authentication
Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'loginUser']);
    Route::get('profile', [LoginController::class, 'profile'])->middleware('auth:sanctum');
    Route::put('profile/update', [UserController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::put('change-password', [UserController::class, 'changePassword'])->middleware('auth:sanctum');
    Route::post('profile/set-photo', [UserController::class, 'setPhoto'])->middleware('auth:sanctum');
    //password resets
    Route::group(['prefix' => 'passwords'], function () {
        Route::post('/reset-link', [ResetPasswordController::class, 'index']);
        Route::post('/reset', [ResetPasswordController::class, 'reset']);
    });
});
//teams
Route::prefix('teams')->group(function () {
    Route::get('all', [UserController::class, 'index'])->middleware('auth:sanctum');
    Route::get('show/{id}', [UserController::class, 'showUser'])->middleware('auth:sanctum');
    Route::put('update/{id}', [UserController::class, 'updateUser'])->middleware('auth:sanctum');
    Route::delete('{id}/delete',[UserController::class,'delete'])->middleware('auth:sanctum');
    Route::post('invite', [InviteController::class, 'invite'])->middleware('auth:sanctum');
    Route::post('set-password', [InviteController::class, 'setPassword']);
});
//status
Route::prefix('status')->group(function () {
    Route::get('all', [StatusController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [StatusController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [StatusController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [StatusController::class, 'delete'])->middleware('auth:sanctum');
});
//channels
Route::prefix('channels')->group(function () {
    Route::get('all', [ChannelController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [ChannelController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [ChannelController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [ChannelController::class, 'delete'])->middleware('auth:sanctum');
});
//group types
Route::prefix('group-types')->group(function () {
    Route::get('all', [GroupTypeController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [GroupTypeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [GroupTypeController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [GroupTypeController::class, 'delete'])->middleware('auth:sanctum');
});
//program types
Route::prefix('program-types')->group(function () {
    Route::get('all', [ProgramTypeController::class, 'index'])->middleware('auth:sanctum');
    Route::post('create', [ProgramTypeController::class, 'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [ProgramTypeController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [ProgramTypeController::class, 'delete'])->middleware('auth:sanctum');
});
//Programs
Route::group(['prefix' => 'programs','middleware' => 'auth:sanctum'], function(){
    Route::get('/all',[ProgramController::class,'index']);
    Route::post('/create',[ProgramController::class,'store']);
    Route::get('/{id}/details',[ProgramController::class,'show']);
    Route::patch('/{id}/update',[ProgramController::class,'update']);
    Route::delete('/{id}/delete',[ProgramController::class,'destroy']);
    Route::group(['prefix' => 'invite'], function(){
        Route::post('/{id}/send',[ProgramController::class,'sendInvites']);
    });
    //member types
    Route::group(['prefix' => 'member-types'], function(){
        Route::get('/',[ProgramMemberTypeController::class,'index']);
        Route::post('/create',[ProgramMemberTypeController::class,'store']);
        Route::get('/{id}/details',[ProgramMemberTypeController::class,'show']);
        Route::patch('/{id}/update',[ProgramMemberTypeController::class,'update']);
        Route::delete('/{id}/delete',[ProgramMemberTypeController::class,'destroy']);
    });
    //Program Members
    Route::get('/{id}/members',[ProgramMemberController::class,'index']);
    Route::post('/{id}/new-members',[ProgramMemberController::class,'store']);
    Route::post('/{id}/revoke-membership',[ProgramMemberController::class,'removeMember']);
    Route::post('/{id}/activate-membership',[ProgramMemberController::class,'activateMember']);
});
//clients
Route::group(['prefix' => 'clients','middleware' => 'auth:sanctum'], function(){ 
    Route::post('create', [ClientController::class, 'create']);
    Route::get('/{id}/details',[ClientController::class,'show']);
});






