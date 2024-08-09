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

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/idiomas/index', [App\Http\Controllers\IdiomasController::class, 'index'])->name('idiomas_index');
    Route::post('/admin/idiomas/store', [App\Http\Controllers\IdiomasController::class, 'store'])->name('idiomas_store');
    Route::put('/admin/idiomas/{id}/update', [App\Http\Controllers\IdiomasController::class, 'update'])->name('idiomas_update');
    Route::delete('/admin/idiomas/{id}/delete', [App\Http\Controllers\IdiomasController::class, 'delete'])->name('idiomas_delete');
    //Cursos
    Route::get('/admin/cursos/index',[App\Http\Controllers\CursosController::class, 'index'])->name('cursos_index');
    Route::post('/admin/cursos/store',[App\Http\Controllers\CursosController::class, 'store'])->name('cursos_store');
    Route::put('admin/cursos/{id}/update',[App\Http\Controllers\CursosController::class, 'update'])->name('cursos_update');
    Route::delete('admin/cursos/{id}/delete',[App\Http\Controllers\CursosController::class, 'delete'])->name('cursos_delete');
    Route::post('/admin/cursos/change/status',[App\Http\Controllers\CursosController::class, 'status'])->name('cursos_status');

});

