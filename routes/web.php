<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\ShipController;
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

//Route::get('/', function () {
//    return view('dashboard');
//});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Crews Profile system
    Route::get('/crews', [CrewController::class, 'index'])->name('crews.index');
    Route::get('/profile', [CrewController::class, 'edit'])->name('crews.edit');
    Route::patch('/profile', [CrewController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [CrewController::class, 'destroy'])->name('profile.destroy');

    //Containers system
    Route::get('/containers', [ContainerController::class, 'index'])->name('containers.index');
    Route::post('/containers/create', [ContainerController::class, 'create'])->name('containers.create');
    Route::put('/containers/update/{journey}/{container}', [ContainerController::class, 'update'])->name('containers.update');
    Route::get('/containers/destroy/{container}', [ContainerController::class, 'destroy'])->name('containers.destroy');

    //Document system
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents/store/{journey}', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/edit/{document}', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/update/{journey}/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::get('/documents/destroy/{journey}/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    //Journey system
    Route::get('/journeys', [JourneyController::class, 'index'])->name('journeys.index');
    Route::get('/journeys/create', [JourneyController::class, 'create'])->name('journeys.create');
    Route::get('/journeys/view/{journey}', [JourneyController::class, 'view'])->name('journeys.view');
    Route::get('/journeys/edit/{journey}', [JourneyController::class, 'edit'])->name('journeys.edit');
    Route::post('/journeys/store', [JourneyController::class, 'store'])->name('journeys.store');
    Route::put('/journeys/update/{journey}', [JourneyController::class, 'update'])->name('journeys.update');

    //Ship system
    Route::get('/ships', [ShipController::class, 'index'])->name('ships.index');
    Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
    Route::get('/ships/view', [ShipController::class, 'view'])->name('ships.view');
    Route::get('/ships/edit', [ShipController::class, 'edit'])->name('ships.edit');
    Route::post('/ships/updatePage/{ship}', [ShipController::class, 'updatePage'])->name('ships.updatePage');
    Route::post('/ships/store', [ShipController::class, 'store'])->name('ships.store');
    Route::put('/ships/update/{ship}', [ShipController::class, 'update'])->name('ships.update');
    Route::put('ships/updateStatus/{ship}', [ShipController::class, 'updateStatus'])->name('ships.updateStatus');
    Route::get('/ships/destroy/{ship}', [ShipController::class, 'destroy'])->name('ships.destroy');

});

require __DIR__.'/auth.php';
