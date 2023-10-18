<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    //Containers system
    Route::get('/containers', [ContainerController::class, 'index'])->name('containers.index');
    Route::post('/containers/create', [ContainerController::class, 'create'])->name('containers.create');
    Route::put('/containers/update/{journey}/{container}', [ContainerController::class, 'update'])->name('containers.update');

    //Document system
    Route::get('/documents/{journey}', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents/store/{journey}', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/edit/{document}', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/update/{journey}/{documents}', [DocumentController::class, 'update'])->name('documents.update');
    Route::get('/documents/destroy/{journey}/{documents}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    //Journey system
    Route::get('/journeys/index', [DocumentController::class, 'index'])->nmae('journeys.index');
    Route::get('/journeys/create', [DocumentController::class, 'create'])->name('journeys.create');
    Route::get('/journeys/view', [DocumentController::class, 'view'])->name('journeys.view');
    Route::get('/journeys/edit', [DocumentController::class, 'edit'])->name('journeys.edit');
    Route::post('/documents/store', [DocumentController::class, 'store'])->name('journeys.store');
    Route::put('/documents/update/{journey}', [DocumentController::class, 'update'])->name('journeys.update');

    //Ship system


});

require __DIR__.'/auth.php';
