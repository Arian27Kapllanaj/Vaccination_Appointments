<?php

use App\Http\Controllers\addCitizenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BookController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth']);
Route::get('/nurse/add/citizen', [PagesController::class, 'addCitizen'])->middleware(['auth']);
Route::post('/add/citizen', [addCitizenController::class, 'addCitizen']);

Route::get('citizen/book',[PagesController::class, 'book']);
Route::post('citizen/add/appointment',[BookController::class, 'addAppointment']);

Route::get('admin/all/scheduled_appointments',[PagesController::class, 'allAppointments']);
Route::get('nurse/all/citizens/appointments',[PagesController::class, 'allCitizensAppointments']);

//logout
Route::get('/logout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

require __DIR__.'/auth.php';
