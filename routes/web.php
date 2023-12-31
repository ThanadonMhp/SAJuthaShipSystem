<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\UserController;
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
    //Profile system
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User system
    Route::get('/crews', [UserController::class, 'index'])->name('crews.index');
    Route::get('/crews/view/{user}', [UserController::class, 'view'])->name('crews.view');
    Route::get('/crews/edit/{user}', [UserController::class, 'edit'])->name('crews.edit');
    Route::get('/crews/pending/{user}', [UserController::class, 'pending'])->name('crews.pending');
    Route::get('/crews/ready/{user}', [UserController::class, 'ready'])->name('crews.ready');
    Route::get('/crews/notready/{user}', [UserController::class, 'notready'])->name('crews.notready');
    Route::get('/crews/create', [UserController::class, 'create'])->name('crews.create');
    Route::post('/crews/store', [UserController::class, 'store'])->name('crews.store');
    Route::put('/crews/update/{user}', [UserController::class, 'update'])->name('crews.update');

    //Containers system
    Route::get('/containers', [ContainerController::class, 'index'])->name('containers.index');
    Route::get('/containers/edit/{container}', [ContainerController::class, 'edit'])->name('containers.edit');
    Route::get('/containers/create', [ContainerController::class, 'create'])->name('containers.create');
    Route::post('/containers/store', [ContainerController::class, 'store'])->name('containers.store');
    Route::put('/containers/rename/{container}', [ContainerController::class, 'rename'])->name('containers.rename');
    Route::put('/containers/update/{container}', [ContainerController::class, 'update'])->name('containers.update');
    Route::get('/containers/destroy/{container}', [ContainerController::class, 'destroy'])->name('containers.destroy');
    Route::get('/containers/pending/{container}', [ContainerController::class, 'pending'])->name('containers.pending');
    Route::get('/containers/ready/{container}', [ContainerController::class, 'ready'])->name('containers.ready');
    Route::get('/containers/missing/{container}', [ContainerController::class, 'missing'])->name('containers.missing');

    //Document system
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents/store/{journey}', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/edit/{document}', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/update/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/destroy/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
//    Route::get('/documents/pending/{document}', [DocumentController::class, 'pending'])->name('documents.pending');
//    Route::get('/documents/approved/{document}', [DocumentController::class, 'approved'])->name('documents.approved');

    //Journey system
    Route::get('/journeys', [JourneyController::class, 'index'])->name('journeys.index');
    Route::get('/journeys/create', [JourneyController::class, 'create'])->name('journeys.create');
    Route::get('/journeys/view/{journey}', [JourneyController::class, 'view'])->name('journeys.view');
    Route::post('/journeys/store', [JourneyController::class, 'store'])->name('journeys.store');
    Route::put('/journeys/update/{journey}', [JourneyController::class, 'update'])->name('journeys.update');
    Route::get('/journeys/finish/{journey_id}', [JourneyController::class, 'finish'])->name('journeys.finish');
    Route::get('/journeys/ongoing/{journey_id}', [JourneyController::class, 'ongoing'])->name('journeys.ongoing');

    //assign system
    Route::get('/assignment/ship/{journey}', [ShipController::class, 'assignment'])->name('ships.assignment');
    Route::get('/assign/ship/{journey}/{ship}', [ShipController::class, 'assign'])->name('ships.assign');
    Route::get('/unassign/ship/{journey}/{ship}', [ShipController::class, 'unassign'])->name('ships.unassign');

    Route::get('/assignment/crew/{journey}', [UserController::class, 'assignment'])->name('crews.assignment');
    Route::get('/assign/crew/{journey}/{user}', [UserController::class, 'assign'])->name('crews.assign');
    Route::get('/unassign/crew/{journey}/{user}', [UserController::class, 'unassign'])->name('crews.unassign');

    Route::get('/assignment/container/{journey}', [ContainerController::class, 'assignment'])->name('containers.assignment');
    Route::get('/assign/container/{journey}/{container}', [ContainerController::class, 'assign'])->name('containers.assign');
    Route::get('/unassign/container/{journey}/{container}', [ContainerController::class, 'unassign'])->name('containers.unassign');

    Route::get('/journeys/edit/{journey}', [JourneyController::class, 'edit'])->name('journeys.edit');

    //Ship system
    Route::get('/ships', [ShipController::class, 'index'])->name('ships.index');
    Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
    Route::get('/ships/view/{ship_id}', [ShipController::class, 'view'])->name('ships.view');
    Route::get('/ships/edit/{ship}', [ShipController::class, 'edit'])->name('ships.edit');
    Route::get('/ships/updatePage/{ship}', [ShipController::class, 'updatePage'])->name('ships.updatePage');
    Route::post('/ships/store', [ShipController::class, 'store'])->name('ships.store');
    Route::put('/ships/update/{ship}', [ShipController::class, 'update'])->name('ships.update');
    Route::put('ships/updateStatus/{ship}', [ShipController::class, 'updateStatus'])->name('ships.updateStatus');
    Route::get('/ships/destroy/{ship}', [ShipController::class, 'destroy'])->name('ships.destroy');

});

require __DIR__.'/auth.php';
