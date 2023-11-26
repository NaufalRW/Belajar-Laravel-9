<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/register', function () {
    return view('Register');
});
*/

Route::get('/', function() {
    return view('welcome');
});

Route::get('/settings', function() {
    return view('settings', ['title' => 'Settings']);
});

Route::get('/profile', function() {
    return view('profile', ['title' => 'Profile']);
});

Route::get('/data', function() {
    $data = User::all();
    return view('data', ['data' => $data, 'title' => 'All Data']);
})->name('data');

Route::get('/', [UserController::class, 'home'])->middleware('check.authenticated');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('refreshNilai', [UserController::class, 'giveNilai'])->name('giveNilai');

Route::post('/ubahnilai/{user_id}', [UserController::class, 'ubahNilai'])->name('ubahNilai');