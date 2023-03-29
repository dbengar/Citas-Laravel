<?php

use App\Http\Controllers\ProjectController;
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

Route::get('/',[ProjectController::class, 'getAllDepartments']);

Route::post('/showAppointments', [ProjectController::class, 'showAppointments'])->name('showAppointments')->middleware('auth');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');
**/
Route::post('/bookAppointment', [ProjectController::class, 'bookAppointment'])->name('bookAppointment')->middleware('auth');