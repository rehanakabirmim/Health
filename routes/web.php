<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//home
//homecontroler
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

//apointment frontend


Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);




Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');


//Frontend

Route::get('/doctor', [FrontendController::class, 'doctor']);
Route::get('/doctor/about', [FrontendController::class, 'about']);
Route::get('/doctor/contact', [FrontendController::class, 'contact']);
Route::get('/apply', [FrontendController::class, 'apply']);

// find doctors as speciality
Route::get('/find/doctor/{specialty}', [DoctorController::class, 'findDoctors']);

//doctor
Route::get('dashboard/doctor', [DoctorController::class, 'index']);
Route::get('dashboard/doctor/add', [DoctorController::class, 'add']);
Route::get('dashboard/doctor/edit/{id}', [DoctorController::class, 'edit']);
Route::get('dashboard/doctor/view/{id}', [DoctorController::class, 'view']);
Route::post('dashboard/doctor/submit', [DoctorController::class, 'insert']);
Route::post('dashboard/doctor/update', [DoctorController::class, 'update']);
// Route::post('dashboard/user/softdelete', [UserController::class, 'softdelete']);
// Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::get('dashboard/user/delete/{id}', [DoctorController::class, 'delete']);

//appointment backend

Route::get('dashboard/show_appoint', [AppointmentController::class, 'show_appoint']);

Route::get('dashboard/approved/{id}',[AppointmentController::class,'approved']);
Route::get('dashboard/canceled/{id}',[AppointmentController::class,'canceled']);


//contact frontend
Route::post('/contact',[HomeController::class,'contact']);

//contact backend
Route::get('dashboard/show_contact', [ContactController::class, 'show_contact']);
//join as doctor
Route::post('/apply',[HomeController::class,'apply']);
// Route::post('/Apply',[HomeController::class,'apply']);

//apply backend
Route::get('dashboard/show_apply', [DoctorController::class, 'show_apply']);
Route::get('dashboard/apply/view/{id}', [DoctorController::class, 'apply_view']);


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
