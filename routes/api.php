<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
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

Route::prefix('country')->group(function (){
    Route::get('all',[CountryController::class,'all']);
    Route::get('active',[CountryController::class,'activeCountries']);
    Route::put('update',[CountryController::class,'toggleStatus'])->middleware('auth:sanctum');
});
Route::prefix('timezone')->group(function (){
    Route::get('all',[TimezoneController::class,'all']);
    Route::get('active',[TimezoneController::class,'activeTimezones']);
});
Route::prefix('office')->group(function () {
    Route::get('all', [OfficeController::class,'all'])->middleware('auth:sanctum');
    Route::post('create', [OfficeController::class,'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [OfficeController::class,'update'])->middleware('auth:sanctum');
    Route::get('/{id}/members',[OfficeController::class,'members'])->middleware('auth:sanctum');
});
//Roles and permissions
Route::prefix('permission')->group(function () {
    Route::get('all', [PermissionController::class,'index'])->middleware('auth:sanctum');
    Route::post('create', [PermissionController::class,'create'])->middleware('auth:sanctum');
});
Route::prefix('role')->group(function () {
    Route::get('all', [RoleController::class,'index'])->middleware('auth:sanctum');
    Route::get('view/{id}', [RoleController::class,'showRole'])->middleware('auth:sanctum');
    Route::post('create', [RoleController::class,'create'])->middleware('auth:sanctum');
    Route::put('update/{id}', [RoleController::class,'updateRole'])->middleware('auth:sanctum');
    Route::delete('delete/{id}', [RoleController::class,'deleteRole'])->middleware('auth:sanctum');
});
//Authentication
Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class,'loginUser']);
    Route::get('profile', [LoginController::class,'profile'])->middleware('auth:sanctum');
    Route::put('profile/update', [UserController::class,'updateProfile'])->middleware('auth:sanctum');
    Route::put('change-password', [UserController::class,'changePassword'])->middleware('auth:sanctum');
    Route::post('profile/set-photo', [UserController::class,'setPhoto'])->middleware('auth:sanctum');
    //password resets
    Route::group(['prefix' => 'passwords'], function(){
        Route::post('/reset-link',[ResetPasswordController::class,'index']);
        Route::post('/reset',[ResetPasswordController::class,'reset']);
    });
});
//teams
Route::prefix('teams')->group(function () {
   Route::get('all', [UserController::class,'index'])->middleware('auth:sanctum');
   Route::get('show/{id}', [UserController::class,'showUser'])->middleware('auth:sanctum');
   Route::post('invite', [InviteController::class,'invite'])->middleware('auth:sanctum');
   Route::post('set-password', [InviteController::class,'setPassword']);

});



