<?php

use App\Http\Controllers\addCitizenController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AppointmentController;
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
Route::post('/add/citizen', [addCitizenController::class, 'addCitizen']);

//Citizen
Route::get('citizen/book',[PagesController::class, 'book']);
Route::post('citizen/add/appointment',[BookController::class, 'addAppointment']);
Route::get('citizen/view/vaccination/date', [PagesController::class, 'viewDate']);
Route::get('citizen/certificate', [PagesController::class, 'certificate']);

//logout
Route::get('/logout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

//Nurse
Route::get('/nurse/add/citizen', [PagesController::class, 'addCitizen'])->middleware(['auth']);
Route::get('nurse/all/citizens/appointments',[PagesController::class, 'allCitizensAppointments']);
Route::get('/confirm/{id}', [AppointmentController::class, 'confirmed']);
Route::get('/cancelled/{id}', [AppointmentController::class, 'cancelled']);
Route::get('/missed/{id}', [AppointmentController::class, 'missed']);

//Admin
Route::get('admin/all/scheduled_appointments',[PagesController::class, 'allAppointments']);
Route::get('admin/all/missed', [PagesController::class, 'allMissed']);
Route::get('admin/all/cancelled', [PagesController::class, 'allCancelled']);
Route::get('/admin/add/vaccination/center', [PagesController::class, 'addVaccinationCenter']);
Route::post('/add/vac_center', [AddController::class, 'addVaccinationCenter']);
Route::get('/admin/add/vaccine', [PagesController::class, 'addVaccine']);
Route::post('/add/vaccine', [AddController::class, 'addVaccine']);
Route::get('/admin/all/citizens/without/appointments', [PagesController::class, 'withoutAppointments']);
Route::get('admin/add_vaccination_to_vac_center', [PagesController::class, 'addVaccineToVacCenter']);
Route::post('add/vaccine/vaccination_center', [AddController::class, 'addVaccineToVacCenterForm']);

require __DIR__.'/auth.php';
