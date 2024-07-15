<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Models\Player;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//
Route::get('/players', function () {
    $players = Player::all();
    return view('players.index', ['players' => $players]);
});

//
Route::get('/players/create', function () {
    return view('players.create');
});

//
Route::post('/players', function (Request $request) {
    $player = new Player();
    $player->name = $request->input('name');
    $player->save();
    return redirect('/players');
});

//
Route::get('/players/{id}', function ($id) {
    $player = Player::findOrFail($id);
    return view('players.show', ['player' => $player]);
});

//
Route::get('/players/{id}/edit', function ($id) {
    $player = Player::findOrFail($id);
    return view('players.edit', ['player' => $player]);
});

// 
Route::put('/players/{id}', function (Request $request, $id) {
    $player = Player::findOrFail($id);
    $player->name = $request->input('name');
    $player->save();
    return redirect('/players/' . $id);
});


Route::delete('/players/{id}', function ($id) {
    $player = Player::findOrFail($id);
    $player->delete();
    return redirect('/players');
});


//  Utilisation de contrôleurs pour les routes CRUD
Route::get('/players', 'PlayerController@index');
Route::get('/players/create', 'PlayerController@create');
Route::post('/players', 'PlayerController@store');
Route::get('/players/{id}', 'PlayerController@show');
Route::get('/players/{id}/edit', 'PlayerController@edit');
Route::put('/players/{id}', 'PlayerController@update');
Route::delete('/players/{id}', 'PlayerController@destroy');

Route::get('/player', [PlayerController::class, 'liste_player']);
Route::get('/create', [PlayerController::class, 'create_player']);
