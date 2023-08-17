<?php


use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [PageController::class, 'dashboard']);

Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/account', [PageController::class, 'account']);

Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [PageController::class, 'login']);

Route::get('/register', [PageController::class, 'register']);


Route::prefix('register')->group(function () {
    Route::post('delete', [PageController::class, 'delete_account']);
    Route::post('save', [PageController::class, 'save_account']);
});