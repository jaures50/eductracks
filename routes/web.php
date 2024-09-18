<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ParcoursAcademiqueController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\LieuStageController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\ConduiteController;

Route::resource('etudiants', EtudiantController::class)->names([
    'index' => 'etudiants.index',
    'create' => 'etudiants.create',
    'store' => 'etudiants.store',
    'show' => 'etudiants.show',
    'edit' => 'etudiants.edit',
    'update' => 'etudiants.update',
    'destroy' => 'etudiants.destroy',
]);

Route::resource('parcours-academiques', ParcoursAcademiqueController::class)->names([
    'index' => 'parcours-academiques.index',
    'create' => 'parcours-academiques.create',
    'store' => 'parcours-academiques.store',
    'show' => 'parcours-academiques.show',
    'edit' => 'parcours-academiques.edit',
    'update' => 'parcours-academiques.update',
    'destroy' => 'parcours-academiques.destroy',
]);

Route::resource('formateurs', FormateurController::class)->names([
    'index' => 'formateurs.index',
    'create' => 'formateurs.create',
    'store' => 'formateurs.store',
    'show' => 'formateurs.show',
    'edit' => 'formateurs.edit',
    'update' => 'formateurs.update',
    'destroy' => 'formateurs.destroy',
]);

Route::resource('lieux-stages', LieuStageController::class)->names([
    'index' => 'lieux-stages.index',
    'create' => 'lieux-stages.create',
    'store' => 'lieux-stages.store',
    'show' => 'lieux-stages.show',
    'edit' => 'lieux-stages.edit',
    'update' => 'lieux-stages.update',
    'destroy' => 'lieux-stages.destroy',
]);

Route::resource('stages', StageController::class)->names([
    'index' => 'stages.index',
    'create' => 'stages.create',
    'store' => 'stages.store',
    'show' => 'stages.show',
    'edit' => 'stages.edit',
    'update' => 'stages.update',
    'destroy' => 'stages.destroy',
]);

Route::resource('conduite', ConduiteController::class)->names([
    'index' => 'conduite.index',
    'create' => 'conduite.create',
    'store' => 'conduite.store',
    'show' => 'conduite.show',
    'edit' => 'conduite.edit',
    'update' => 'conduite.update',
    'destroy' => 'conduite.destroy',
]);



Route::resource('formateurs', FormateurController::class);


Route::resource('lieux_stages', LieuStageController::class);


Route::get('/nbrtotal', [EtudiantController::class, 'nbr'])->name('nbrtotal');

Route::put('/stages/{id}', [StageController::class, 'update'])->name('stages.update');
