<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddPersonController;
use App\Http\Controllers\UpdatePersonController;
use App\Http\Controllers\DeletePersonController;
use App\Http\Controllers\PersonController;

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

Route::post('/insert/person-data', [PersonController::class, 'store'])->name('person.store');
Route::post('/update/person-data/{id}', [PersonController::class, 'update'])->name('person.update');
Route::post('/delete/person-data/{person}', [PersonController::class, 'delete'])->name('person.delete');

