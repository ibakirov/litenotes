<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TrashController;

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


Route::resource('/notes', NoteController::class)->middleware(['auth']);

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function(){
    Route::get('/', [TrashController::class, 'index'])->name('index');
    Route::get('/{note}', [TrashController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{note}', [TrashController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{note}', [TrashController::class, 'destroy'])->name('destroy')->withTrashed();
});

require __DIR__.'/auth.php';
