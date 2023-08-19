<?php


use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\NewsController;
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
Route::get('/', [PageController::class, 'login']);
Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/account', [PageController::class, 'account']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/logout', [AccountController::class, 'logout']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/news', [PageController::class, 'news']);
Route::get('/getnews', [NewsController::class, 'get_news']);

Route::post('/login', [AccountController::class, 'login']);
Route::prefix('register')->group(function () {
    Route::post('delete', [PageController::class, 'delete_account']);
    Route::post('save', [PageController::class, 'save_account']);
});

Route::prefix('news')->group(function () {
    Route::post('delete', [NewsController::class, 'delete_news']);
    Route::post('save', [NewsController::class, 'save_news']);
 
});