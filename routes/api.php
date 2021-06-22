<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Route;

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
    Route::put('update',[CountryController::class,'toggleStatus']);
});
Route::prefix('timezone')->group(function (){
    Route::get('all',[TimezoneController::class,'all']);
    Route::get('active',[TimezoneController::class,'activeTimezones']);
});
Route::prefix('office')->group(function () {
    Route::get('all', [OfficeController::class,'all']);
    Route::post('create', [OfficeController::class,'create']);
    Route::put('update/{id}', [OfficeController::class,'update']);
});
//Roles and permissions
Route::prefix('permission')->group(function () {
    Route::get('all', [PermissionController::class,'index']);
    Route::post('create', [PermissionController::class,'create']);
});
Route::prefix('role')->group(function () {
    Route::get('all', [RoleController::class,'index']);
    Route::get('view/{id}', [RoleController::class,'showRole']);
    Route::post('create', [RoleController::class,'create']);
    Route::put('update/{id}', [RoleController::class,'updateRole']);
    Route::delete('delete/{id}', [RoleController::class,'deleteRole']);
});
//Authentication
Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class,'loginUser']);
});
//teams
Route::prefix('teams')->group(function () {
   Route::post('invite', [InviteController::class,'invite']);

});



