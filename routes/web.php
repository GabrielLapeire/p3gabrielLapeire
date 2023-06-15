<?php

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectSettingsController;

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

    Route::resource('students', StudentController::class); //conjunto de rutas CRUD
    Route::resource('careers', CareerController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('subjectSettings', SubjectSettingsController::class);
    Route::get('subjectClass/{id}', [SubjectSettingsController::class, 'subjectClass'])->name('subjectClass');
  
    Route::resource('assistances', AssistanceController::class, ['only' => ['index', 'update', 'destroy', 'edit']]);

    Route::get('audits', [AuditController::class, 'index'])->name('audits.index');
});

Route::get('assistances/create', [AssistanceController::class, 'create'])->name('assistances.create');
Route::post('assistances', [AssistanceController::class, 'store'])->name('assistances.store');
// ruta sin autenticacion de tipo post para alta de asistencias

require __DIR__.'/auth.php';
