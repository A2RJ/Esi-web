<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Event_inv_teamsController;
use App\Http\Controllers\Event_teamsController;
use App\Http\Controllers\Event_winnerController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Game_categoriesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management_inv_squadsController;
use App\Http\Controllers\ManagementsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\Request_managementsController;
use App\Http\Controllers\Request_squadsController;
use App\Http\Controllers\Squad_inv_playersController;
use App\Http\Controllers\SquadsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth as MiddlewareAuth;
use App\Models\Events;
use App\Models\Managements;
use App\Models\Squads;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', function () {
    $events = Events::latest();
    if (request('event')) {
        $events = $events->where('event_name', 'LIKE', '%' . request('event') . '%');
    }

    $squads = Squads::latest();
    if (request('squad')) $squads->where('squad_name', 'LIKE', '%' . request('squad') . '%');

    $managements = Managements::latest();
    if (request('management')) $managements->where('management_name', 'LIKE', '%' . request('management') . '%');

    $events = $events->paginate(6, ['*'], 'events');
    $squads = $squads->paginate(6, ['*'], 'squads');
    $managements = $managements->paginate(6, ['*'], 'managements');

    return view('index', compact('events', 'squads', 'managements'));
});

Route::group(['prefix' => '/home'], function () {
    Route::get('/error', function () {
        return view('test.error');
    });

    Route::get('/', function () {
        return view('test.index');
    })->middleware('auth');
    
    Route::get('/event/{id}', [HomeController::class, 'event']);
    Route::get('/player/{id}', [HomeController::class, 'player']);
    Route::get('/squad/{id}', [HomeController::class, 'squad']);
    Route::get('/management/{id}', [HomeController::class, 'management']);
});

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::get('/show/{id}', [AdminController::class, 'show']);
    Route::post('/store', [AdminController::class, 'store']);
    Route::get('/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/update/{id}', [AdminController::class, 'update']);
    Route::get('/destroy/{id}', [AdminController::class, 'destroy']);
});
// users
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/destroy/{id}', [UserController::class, 'destroy']);
});

// players
Route::group(['prefix' => 'players', 'middleware' => ['auth']], function () {
    Route::get('/', [PlayersController::class, 'index']);
    Route::get('/create', [PlayersController::class, 'create']);
    Route::get('/show/{id}', [PlayersController::class, 'show']);
    Route::get('/players', [PlayersController::class, 'players']);
    Route::post('/store', [PlayersController::class, 'store']);
    Route::get('/edit/{id}', [PlayersController::class, 'edit']);
    Route::post('/update/{id}', [PlayersController::class, 'update']);
    Route::get('/destroy/{id}', [PlayersController::class, 'destroy']);
});

// squads
Route::group(['prefix' => 'squads', 'middleware' => 'auth'], function () {
    Route::get('/', [SquadsController::class, 'index']);
    Route::get('/create', [SquadsController::class, 'create']);
    Route::get('/show/{id}', [SquadsController::class, 'show']);
    Route::get('/squads', [SquadsController::class, 'squads']);
    Route::post('/store', [SquadsController::class, 'store']);
    Route::get('/edit/{id}', [SquadsController::class, 'edit']);
    Route::post('/update/{id}', [SquadsController::class, 'update']);
    Route::get('/destroy/{id}', [SquadsController::class, 'destroy']);
});

// squad inv players
Route::group(['prefix' => 'squad_inv_players', 'middleware' => 'auth'], function () {
    Route::get('/', [Squad_inv_playersController::class, 'index']);
    Route::get('/inviteFromSquad', [Squad_inv_playersController::class, 'inviteFromSquad']);
    Route::get('/create', [Squad_inv_playersController::class, 'create']);
    Route::get('/show/{id}', [Squad_inv_playersController::class, 'show']);
    Route::get('/terima/{id}', [Squad_inv_playersController::class, 'terima']);
    Route::post('/store', [Squad_inv_playersController::class, 'store']);
    Route::get('/edit/{id}', [Squad_inv_playersController::class, 'edit']);
    Route::post('/update/{id}', [Squad_inv_playersController::class, 'update']);
    Route::get('/destroy/{id}', [Squad_inv_playersController::class, 'destroy']);
});

// request squads
Route::group(['prefix' => 'request_squads', 'middleware' => 'auth'], function () {
    Route::get('/', [Request_squadsController::class, 'index']);
    Route::get('/requestFromPlayers', [Request_squadsController::class, 'requestFromPlayers']);
    Route::get('/create', [Request_squadsController::class, 'create']);
    Route::get('/show/{id}', [Request_squadsController::class, 'show']);
    Route::get('/terima/{id}', [Request_squadsController::class, 'terima']);
    Route::post('/store', [Request_squadsController::class, 'store']);
    Route::get('/edit/{id}', [Request_squadsController::class, 'edit']);
    Route::post('/update/{id}', [Request_squadsController::class, 'update']);
    Route::get('/destroy/{id}', [Request_squadsController::class, 'destroy']);
});

// managements
Route::group(['prefix' => 'managements', 'middleware' => 'auth'], function () {
    Route::get('/', [ManagementsController::class, 'index']);
    Route::get('/create', [ManagementsController::class, 'create']);
    Route::get('/show/{id}', [ManagementsController::class, 'show']);
    Route::get('/managements', [ManagementsController::class, 'managements']);
    Route::post('/store', [ManagementsController::class, 'store']);
    Route::get('/edit/{id}', [ManagementsController::class, 'edit']);
    Route::post('/update/{id}', [ManagementsController::class, 'update']);
    Route::get('/destroy/{id}', [ManagementsController::class, 'destroy']);
});

// managements inv squads
Route::group(['prefix' => 'management_inv_squads', 'middleware' => 'auth'], function () {
    Route::get('/', [Management_inv_squadsController::class, 'index']);
    Route::get('/invite', [Management_inv_squadsController::class, 'invite']);
    Route::get('/create', [Management_inv_squadsController::class, 'create']);
    Route::get('/show/{id}', [Management_inv_squadsController::class, 'show']);
    Route::get('/terima/{id}', [Management_inv_squadsController::class, 'terima']);
    Route::post('/store', [Management_inv_squadsController::class, 'store']);
    Route::get('/edit/{id}', [Management_inv_squadsController::class, 'edit']);
    Route::post('/update/{id}', [Management_inv_squadsController::class, 'update']);
    Route::get('/destroy/{id}', [Management_inv_squadsController::class, 'destroy']);
});

// request managements
Route::group(['prefix' => 'request_managements', 'middleware' => 'auth'], function () {
    Route::get('/', [Request_managementsController::class, 'index']);
    Route::get('/requestFromSquads', [Request_managementsController::class, 'requestFromSquads']);
    Route::get('/create', [Request_managementsController::class, 'create']);
    Route::get('/show/{id}', [Request_managementsController::class, 'show']);
    Route::get('/terima/{id}', [Request_managementsController::class, 'terima']);
    Route::post('/store', [Request_managementsController::class, 'store']);
    Route::get('/edit/{id}', [Request_managementsController::class, 'edit']);
    Route::post('/update/{id}', [Request_managementsController::class, 'update']);
    Route::get('/destroy/{id}', [Request_managementsController::class, 'destroy']);
});

// games
Route::group(['prefix' => 'games', 'middleware' => 'auth'], function () {
    Route::get('/', [GamesController::class, 'index']);
    Route::get('/create', [GamesController::class, 'create']);
    Route::get('/show/{id}', [GamesController::class, 'show']);
    Route::post('/store', [GamesController::class, 'store']);
    Route::get('/edit/{id}', [GamesController::class, 'edit']);
    Route::post('/update/{id}', [GamesController::class, 'update']);
    Route::get('/destroy/{id}', [GamesController::class, 'destroy']);
});

// game categories
Route::group(['prefix' => 'game_categories', 'middleware' => 'auth'], function () {
    Route::get('/', [Game_categoriesController::class, 'index']);
    Route::get('/create', [Game_categoriesController::class, 'create']);
    Route::get('/show/{id}', [Game_categoriesController::class, 'show']);
    Route::post('/store', [Game_categoriesController::class, 'store']);
    Route::get('/edit/{id}', [Game_categoriesController::class, 'edit']);
    Route::post('/update/{id}', [Game_categoriesController::class, 'update']);
    Route::get('/destroy/{id}', [Game_categoriesController::class, 'destroy']);
});

// events
Route::group(['prefix' => 'events', 'middleware' => 'auth'], function () {
    Route::get('/', [EventsController::class, 'index']);
    Route::get('/create', [EventsController::class, 'create']);
    Route::get('/show/{id}', [EventsController::class, 'show'])->withoutMiddleware([MiddlewareAuth::class]);
    Route::get('/setEvent/{id}', [EventsController::class, 'setEvent']);
    Route::get('/events', [EventsController::class, 'events']);
    Route::post('/store', [EventsController::class, 'store']);
    Route::get('/edit/{id}', [EventsController::class, 'edit']);
    Route::post('/update/{id}', [EventsController::class, 'update']);
    Route::get('/destroy/{id}', [EventsController::class, 'destroy']);
});

// event teams
Route::group(['prefix' => 'event_teams', 'middleware' => 'auth'], function () {
    Route::get('/', [Event_teamsController::class, 'index']);
    Route::get('/create/{id}', [Event_teamsController::class, 'create']);
    Route::get('/show/{id}', [Event_teamsController::class, 'show']);
    Route::post('/store', [Event_teamsController::class, 'store']);
    Route::get('/edit/{id}', [Event_teamsController::class, 'edit']);
    Route::post('/update/{id}', [Event_teamsController::class, 'update']);
    Route::get('/destroy/{id}', [Event_teamsController::class, 'destroy']);
});

// event inv teams
Route::group(['prefix' => 'event_inv_teams', 'middleware' => 'auth'], function () {
    Route::get('/', [Event_inv_teamsController::class, 'index']);
    Route::get('/create/{id}', [Event_inv_teamsController::class, 'create']);
    Route::get('/invite', [Event_inv_teamsController::class, 'invite']);
    Route::get('/show/{id}', [Event_inv_teamsController::class, 'show']);
    Route::get('/terima/{id}', [Event_inv_teamsController::class, 'terima']);
    Route::post('/store', [Event_inv_teamsController::class, 'store']);
    Route::get('/edit/{id}', [Event_inv_teamsController::class, 'edit']);
    Route::post('/update/{id}', [Event_inv_teamsController::class, 'update']);
    Route::get('/destroy/{id}', [Event_inv_teamsController::class, 'destroy']);
});

// event winners
Route::group(['prefix' => 'event_winner', 'middleware' => 'auth'], function () {
    Route::get('/', [Event_winnerController::class, 'index']);
    Route::get('/create/{id}', [Event_winnerController::class, 'create']);
    Route::get('/show/{id}', [Event_winnerController::class, 'show']);
    Route::post('/store', [Event_winnerController::class, 'store']);
    Route::get('/edit/{id}', [Event_winnerController::class, 'edit']);
    Route::post('/update/{id}', [Event_winnerController::class, 'update']);
    Route::get('/destroy/{id}', [Event_winnerController::class, 'destroy']);
});
