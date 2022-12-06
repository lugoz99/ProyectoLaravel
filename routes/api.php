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
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PlayerTeamsController;
use App\Http\Controllers\ProfilesContoller;
use App\Http\Controllers\RentElement;
use App\Http\Controllers\RentElementsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SecurityController;
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



Route::controller(PermissionsRolsController::class)->group(function () {
    Route::get('permissionsRol', 'index'); //Para obtener todos
    Route::get('permissionsRol/{id}', 'show'); //Para consultar especifico
    Route::post('permissionsRol', 'store'); //Para guardar
    Route::put('permissionsRol/{id}', 'update'); //Para actualizar
    Route::delete('permissionsRol/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(PermissionsController::class)->group(function () {
    Route::get('permissions', 'index'); //Para obtener todos
    Route::get('permissions/{id}', 'show'); //Para consultar especifico
    Route::post('permissions', 'store'); //Para guardar
    Route::put('permissions/{id}', 'update'); //Para actualizar
    Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});


Route::controller(RolsController::class)->group(function () {
    Route::get('rols', 'index'); //Para obtener todos
    Route::get('rols/{id}', 'show'); //Para consultar especifico
    Route::get('rols/reports/count/{id}', 'count');
    Route::get('rols/reports/count/quantities-by-rol', 'quantitiesByRol');
    Route::post('rols', 'store'); //Para guardar
    Route::put('rols/{id}', 'update'); //Para actualizar
    Route::delete('rols/{id}', 'destroy')->whereNumber('id'); //Para eliminar un registro
});

Route::controller(ProfilesContoller::class)->group(function () {
    Route::get('profiles', 'index'); //Para obtener todos
    Route::get('profiles/{id}', 'show'); //Para consultar especifico
    Route::post('profiles', 'store'); //Para guardar
    Route::put('profiles/{id}', 'update'); //Para actualizar
    Route::delete('profiles/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(UsersController::class)->group(function () {
    Route::get('Users', 'index'); //Para obtener todos
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

Route::controller(LocationController::class)->group(function () {
    Route::get('location', 'index'); //Para obtener todos
    Route::get('location/{id}', 'show'); //Para consultar especifico
    Route::post('location', 'store'); //Para guardar
    Route::put('location/{id}', 'update'); //Para actualizar
    Route::delete('location/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(RentElementsController::class)->group(function () {
    Route::get('rentElement','index'); //Para obtener todos
    Route::get('rentElement/{id}', 'show'); //Para consultar especifico
    Route::post('rentElement','store'); //Para guardar
    Route::put('rentElement/{id}', 'update'); //Para actualizar
    Route::delete('rentElement/{id}', 'destroy'); //Para eliminar un registro
});


Route::controller(UsersController::class)->group(function() {
    Route::get('users','index'); //->middleware(['user-access','permission-access']);
    Route::get('users/{id}','show');
    Route::post('users','store');
    Route::put('users/{id}','update');
    Route::delete('users/{id}','destroy');
});

Route::controller(SecurityController::class)->group(function(){
    route::post('login','login');
    route::post('logout','logout');
});
