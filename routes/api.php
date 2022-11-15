<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\permissionsRolsController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\FieldTypeController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PlayerTeamsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\sportTypeController;
use App\Http\Controllers\TeamsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(PermissionsController::class)->group(function () {
    Route::get('permissions', 'index'); //Para obtener todos
    Route::get('permissions/{id}', 'show'); //Para consultar especifico
    Route::post('permissions', 'store'); //Para guardar
    Route::put('permissions/{id}', 'update'); //Para actualizar
    Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});


Route::controller(RolsController::class)->group(function () {
    Route::get('Rols', 'index'); //Para obtener todos
    Route::get('Rols/{id}', 'show'); //Para consultar especifico
    Route::get('Rols/reports/count/{id}', 'count');
    Route::get('Rols/reports/count/quantities-by-rol', 'quantitiesByRol');
    Route::post('Rols', 'store'); //Para guardar
    Route::put('Rols/{id}', 'update'); //Para actualizar
    Route::delete('Rols/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(ProfilesController::class)->group(function () {
    Route::get('Profiles', 'index'); //Para obtener todos
    Route::get('Profiles/{id}', 'show'); //Para consultar especifico
    Route::post('Profiles', 'store'); //Para guardar
    Route::put('Profiles/{id}', 'update'); //Para actualizar
    Route::delete('Profiles/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(UsersController::class)->group(function () {
    Route::get('Users', 'index');//-> middleware(['user-access']); //Para obtener todos
    Route::get('Users/{id}', 'show'); //Para consultar especifico
    Route::post('Users', 'store'); //Para guardar
    Route::put('Users/{id}', 'update'); //Para actualizar
    Route::delete('Users/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(permissionsRolsController::class)->group(function () {
    Route::get('PermisionsRols', 'index'); //Para obtener todos
    Route::get('PermisionsRols/{id}', 'show'); //Para consultar especifico
    Route::post('PermisionsRols', 'store'); //Para guardar
    Route::put('PermisionsRols/{id}', 'update'); //Para actualizar
    Route::delete('PermisionsRols/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(FieldsController::class)->group(function () {
    Route::get('fields', 'index'); //Para obtener todos
    Route::get('fields/{id}', 'show'); //Para consultar especifico
    Route::post('fields', 'store'); //Para guardar
    Route::put('fields/{id}', 'update'); //Para actualizar
    Route::delete('fields/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(PlayersController::class)->group(function () {
    Route::get('player', 'index'); //Para obtener todos
    Route::get('player/{id}', 'show'); //Para consultar especifico
    Route::post('player', 'store'); //Para guardar
    Route::put('player/{id}', 'update'); //Para actualizar
    Route::delete('player/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(PlayerTeamsController::class)->group(function () {
    Route::get('playerTeams', 'index'); //Para obtener todos
    Route::get('playerTeams/{id}', 'show'); //Para consultar especifico
    Route::post('playerTeams', 'store'); //Para guardar
    Route::put('playerTeams/{id}', 'update'); //Para actualizar
    Route::delete('playerTeams/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(TeamsController::class)->group(function () {
    Route::get('team', 'index'); //Para obtener todos
    Route::get('team/{id}', 'show'); //Para consultar especifico
    Route::post('team', 'store'); //Para guardar
    Route::put('team/{id}', 'update'); //Para actualizar
    Route::delete('team/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(ReservationController::class)->group(function () {
    Route::get('reservation', 'index'); //Para obtener todos
    Route::get('reservation/{id}', 'show'); //Para consultar especifico
    Route::post('reservation', 'store'); //Para guardar
    Route::put('reservation/{id}', 'update'); //Para actualizar
    Route::delete('reservation/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(FieldTypeController::class)->group(function () {
    Route::get('fieldType', 'index'); //Para obtener todos
    Route::get('fieldType/{id}', 'show'); //Para consultar especifico
    Route::post('fieldType', 'store'); //Para guardar
    Route::put('fieldType/{id}', 'update'); //Para actualizar
    Route::delete('fieldType/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(sportTypeController::class)->group(function () {
    Route::get('sportType', 'index'); //Para obtener todos
    Route::get('sportType/{id}', 'show'); //Para consultar especifico
    Route::post('sportType', 'store'); //Para guardar
    Route::put('sportType/{id}', 'update'); //Para actualizar
    Route::delete('sportType/{id}', 'destroy'); //Para eliminar un registro
});
