<?php

use App\Http\Controllers\Event_inv_teamsController;
use App\Http\Controllers\Event_teamsController;
use App\Http\Controllers\Event_winnerController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Game_categoriesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\Management_inv_squadsController;
use App\Http\Controllers\ManagementsController;
use App\Http\Controllers\Squad_inv_playersController;
use App\Http\Controllers\SquadsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// users
Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/delete/{id}', [UserController::class, 'delete']);
});

// players
Route::prefix('/players')->group(function () {
    Route::get('/', [PlayersController::class, 'index']);
    Route::get('/create', [PlayersController::class, 'create']);
    Route::get('/show/{id}', [PlayersController::class, 'show']);
    Route::post('/store', [PlayersController::class, 'store']);
    Route::get('/edit/{id}', [PlayersController::class, 'edit']);
    Route::post('/update/{id}', [PlayersController::class, 'update']);
    Route::get('/delete/{id}', [PlayersController::class, 'delete']);
});

// squads
Route::prefix('/squads')->group(function () {
    Route::get('/', [SquadsController::class, 'index']);
    Route::get('/create', [SquadsController::class, 'create']);
    Route::get('/show/{id}', [SquadsController::class, 'show']);
    Route::post('/store', [SquadsController::class, 'store']);
    Route::get('/edit/{id}', [SquadsController::class, 'edit']);
    Route::post('/update/{id}', [SquadsController::class, 'update']);
    Route::get('/delete/{id}', [SquadsController::class, 'delete']);
});

// squad inv players
Route::prefix('/squadinvplayers')->group(function () {
    Route::get('/', [Squad_inv_playersController::class, 'index']);
    Route::get('/create', [Squad_inv_playersController::class, 'create']);
    Route::get('/show/{id}', [Squad_inv_playersController::class, 'show']);
    Route::post('/store', [Squad_inv_playersController::class, 'store']);
    Route::get('/edit/{id}', [Squad_inv_playersController::class, 'edit']);
    Route::post('/update/{id}', [Squad_inv_playersController::class, 'update']);
    Route::get('/delete/{id}', [Squad_inv_playersController::class, 'delete']);
});

// managements
Route::prefix('/managements')->group(function () {
    Route::get('/', [ManagementsController::class, 'index']);
    Route::get('/create', [ManagementsController::class, 'create']);
    Route::get('/show/{id}', [ManagementsController::class, 'show']);
    Route::post('/store', [ManagementsController::class, 'store']);
    Route::get('/edit/{id}', [ManagementsController::class, 'edit']);
    Route::post('/update/{id}', [ManagementsController::class, 'update']);
    Route::get('/delete/{id}', [ManagementsController::class, 'delete']);
});

// managements inv squads
Route::prefix('/managementsinvsquads')->group(function () {
    Route::get('/', [Management_inv_squadsController::class, 'index']);
    Route::get('/create', [Management_inv_squadsController::class, 'create']);
    Route::get('/show/{id}', [Management_inv_squadsController::class, 'show']);
    Route::post('/store', [Management_inv_squadsController::class, 'store']);
    Route::get('/edit/{id}', [Management_inv_squadsController::class, 'edit']);
    Route::post('/update/{id}', [Management_inv_squadsController::class, 'update']);
    Route::get('/delete/{id}', [Management_inv_squadsController::class, 'delete']);
});

// games
Route::prefix('/games')->group(function () {
    Route::get('/', [GamesController::class, 'index']);
    Route::get('/create', [GamesController::class, 'create']);
    Route::get('/show/{id}', [GamesController::class, 'show']);
    Route::post('/store', [GamesController::class, 'store']);
    Route::get('/edit/{id}', [GamesController::class, 'edit']);
    Route::post('/update/{id}', [GamesController::class, 'update']);
    Route::get('/delete/{id}', [GamesController::class, 'delete']);
});

// game categories
Route::prefix('/gamecategories')->group(function () {
    Route::get('/', [Game_categoriesController::class, 'index']);
    Route::get('/create', [Game_categoriesController::class, 'create']);
    Route::get('/show/{id}', [Game_categoriesController::class, 'show']);
    Route::post('/store', [Game_categoriesController::class, 'store']);
    Route::get('/edit/{id}', [Game_categoriesController::class, 'edit']);
    Route::post('/update/{id}', [Game_categoriesController::class, 'update']);
    Route::get('/delete/{id}', [Game_categoriesController::class, 'delete']);
});

// events
Route::prefix('/events')->group(function () {
    Route::get('/', [EventsController::class, 'index']);
    Route::get('/create', [EventsController::class, 'create']);
    Route::get('/show/{id}', [EventsController::class, 'show']);
    Route::post('/store', [EventsController::class, 'store']);
    Route::get('/edit/{id}', [EventsController::class, 'edit']);
    Route::post('/update/{id}', [EventsController::class, 'update']);
    Route::get('/delete/{id}', [EventsController::class, 'delete']);
});

// event teams
Route::prefix('/eventteams')->group(function () {
    Route::get('/', [Event_teamsController::class, 'index']);
    Route::get('/create', [Event_teamsController::class, 'create']);
    Route::get('/show/{id}', [Event_teamsController::class, 'show']);
    Route::post('/store', [Event_teamsController::class, 'store']);
    Route::get('/edit/{id}', [Event_teamsController::class, 'edit']);
    Route::post('/update/{id}', [Event_teamsController::class, 'update']);
    Route::get('/delete/{id}', [Event_teamsController::class, 'delete']);
});

// event inv teams
Route::prefix('/eventinvteams')->group(function () {
    Route::get('/', [Event_inv_teamsController::class, 'index']);
    Route::get('/create', [Event_inv_teamsController::class, 'create']);
    Route::get('/show/{id}', [Event_inv_teamsController::class, 'show']);
    Route::post('/store', [Event_inv_teamsController::class, 'store']);
    Route::get('/edit/{id}', [Event_inv_teamsController::class, 'edit']);
    Route::post('/update/{id}', [Event_inv_teamsController::class, 'update']);
    Route::get('/delete/{id}', [Event_inv_teamsController::class, 'delete']);
});

// event winners
Route::prefix('/eventwinners')->group(function () {
    Route::get('/', [Event_winnerController::class, 'index']);
    Route::get('/create', [Event_winnerController::class, 'create']);
    Route::get('/show/{id}', [Event_winnerController::class, 'show']);
    Route::post('/store', [Event_winnerController::class, 'store']);
    Route::get('/edit/{id}', [Event_winnerController::class, 'edit']);
    Route::post('/update/{id}', [Event_winnerController::class, 'update']);
    Route::get('/delete/{id}', [Event_winnerController::class, 'delete']);
});