<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\FrontendController::class,'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontendController::class,'about'])->name('about');
Route::get('/services', [App\Http\Controllers\FrontendController::class,'services'])->name('services');
Route::get('/students', [App\Http\Controllers\FrontendController::class,'students'])->name('students');

Auth::routes();
Route::any('register', function () { abort(403);});

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/idiomas/index', [App\Http\Controllers\IdiomasController::class, 'index'])->name('idiomas_index');
    Route::post('/admin/idiomas/store', [App\Http\Controllers\IdiomasController::class, 'store'])->name('idiomas_store');
    Route::put('/admin/idiomas/{id}/update', [App\Http\Controllers\IdiomasController::class, 'update'])->name('idiomas_update');
    Route::delete('/admin/idiomas/{id}/delete', [App\Http\Controllers\IdiomasController::class, 'delete'])->name('idiomas_delete');
    Route::post('/admin/idiomas/change/status', [App\Http\Controllers\IdiomasController::class, 'status'])->name('idiomas_status');
    //Cursos
    Route::get('/admin/cursos/index',[App\Http\Controllers\CursosController::class, 'index'])->name('cursos_index');
    Route::post('/admin/cursos/store',[App\Http\Controllers\CursosController::class, 'store'])->name('cursos_store');
    Route::put('admin/cursos/{id}/update',[App\Http\Controllers\CursosController::class, 'update'])->name('cursos_update');
    Route::delete('admin/cursos/{id}/delete',[App\Http\Controllers\CursosController::class, 'delete'])->name('cursos_delete');
    Route::post('/admin/cursos/change/status',[App\Http\Controllers\CursosController::class, 'status'])->name('cursos_status');
    //Certificaciones
    Route::get('/admin/cert/index',[App\Http\Controllers\CertificacionesController::class, 'index'])->name('cert_index');
    Route::post('/admin/cert/store',[App\Http\Controllers\CertificacionesController::class, 'store'])->name('cert_store');
    Route::put('/admin/cert/{id}/update',[App\Http\Controllers\CertificacionesController::class, 'update'])->name('cert_update');
    Route::delete('/admin/cert/{id}/delete', [App\Http\Controllers\CertificacionesController::class, 'delete'])->name('cert_delete');
    Route::post('/admin/cert/change/status', [App\Http\Controllers\CertificacionesController::class, 'status'])->name('cert_status');
    //Eventos
    Route::get('/admin/events/index', [App\Http\Controllers\EventosController::class, 'index'])->name('events_index');
    Route::post('/admin/events/store',[App\Http\Controllers\EventosController::class, 'store'])->name('events_store');
    Route::put('/admin/events/{id}/update', [App\Http\Controllers\EventosController::class, 'update'])->name('events_update');
    Route::delete('/admin/events/{id}/delete',[App\Http\Controllers\EventosController::class, 'delete'])->name('events_delete');
    Route::post('/admin/events/change/status', [App\Http\Controllers\EventosController::class, 'status'])->name('events_status');
    //Servicios Generales
    Route::get('/admin/services/index',[App\Http\Controllers\ServiciosGeneralesController::class, 'index'])->name('services_index');
    Route::post('/admin/services/store',[App\Http\Controllers\ServiciosGeneralesController::class, 'store'])->name('services_store');
    Route::put('/admin/services/{id}/update',[App\Http\Controllers\ServiciosGeneralesController::class, 'update'])->name('services_update');
    Route::delete('/admin/services/{id}/delete', [App\Http\Controllers\ServiciosGeneralesController::class, 'delete'])->name('services_delete');
    Route::post('/admin/services/change/status', [App\Http\Controllers\ServiciosGeneralesController::class, 'status'])->name('services_status');
    //Plataformas
    Route::get('/admin/platforms/index',[App\Http\Controllers\PlataformaController::class, 'index'])->name('platforms_index');
    Route::post('/admin/platforms/store',[App\Http\Controllers\PlataformaController::class, 'store'])->name('platforms_store');
    Route::put('/admin/platforms/{id}/update',[App\Http\Controllers\PlataformaController::class, 'update'])->name('platforms_update');
    Route::delete('/admin/platforms/{id}/delete', [App\Http\Controllers\PlataformaController::class, 'delete'])->name('platforms_delete');
    Route::post('/admin/platforms/change/status', [App\Http\Controllers\PlataformaController::class, 'status'])->name('platforms_status');
    //Servicios Estudiante
    Route::get('/admin/students/index',[App\Http\Controllers\ServiciosEstudianteController::class, 'index'])->name('students_index');
    Route::post('/admin/students/store',[App\Http\Controllers\ServiciosEstudianteController::class, 'store'])->name('students_store');
    Route::put('/admin/students/{id}/update',[App\Http\Controllers\ServiciosEstudianteController::class, 'update'])->name('students_update');
    Route::delete('/admin/students/{id}/delete', [App\Http\Controllers\ServiciosEstudianteController::class, 'delete'])->name('students_delete');
    Route::post('/admin/students/change/status', [App\Http\Controllers\ServiciosEstudianteController::class, 'status'])->name('students_status');
    //Calendario
    Route::get('/admin/calendar/index',[App\Http\Controllers\CalendarioController::class, 'index'])->name('calendar_index');
    Route::get('/api/events', [App\Http\Controllers\CalendarioController::class, 'getEvents']);
    Route::post('/api/events', [App\Http\Controllers\CalendarioController::class, 'store'])->name('calendar_store');
    Route::put('admin/calendar/{id}/update', [App\Http\Controllers\CalendarioController::class, 'update'])->name('calendar_update');
    Route::delete('/admin/calendar/{id}/delete', [App\Http\Controllers\CalendarioController::class, 'delete'])->name('calendar_delete');
});

