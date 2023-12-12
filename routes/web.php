<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
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


Route::get('/',[HomeController::class,'index']);


Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/view_doctors', [AdminController::class, 'index'])->name('admin.index');
Route::get('/add_doctor',[AdminController::class,'create']);
// Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/add_doctor', [AdminController::class, 'store'])->name('admin.store');


Route::get('/edit_doctor/{doctor_id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/update_doctor{doctor_id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/delete_doctor/{doctor_id}', [AdminController::class, 'destroy'])->name('admin.destroy');
// Route::get('/delete_doctor/{doctor_id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::post('/add_appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/view_appointments', [AppointmentController::class, 'index'])->name('appointment.index');
Route::post('/appointments/approve/{id}', [AppointmentController::class, 'approve'])->name('appointment.approve');
Route::post('/appointments/cancel/{id}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
// Route::get('/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::delete('/appointments/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

Route::get('appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::put('appointments/{id}', [AppointmentController::class, 'update'])->name('appointment.update');