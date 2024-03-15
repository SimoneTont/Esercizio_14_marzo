<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', [ProjectsController::class, 'index'])->name('projects.index'); // Pagina principale
Route::get('/details/{id}', [ProjectsController::class, 'show'])->name('projects.show'); // Dettagli
Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create'); // Creazione progetto
Route::post('/create', [ProjectsController::class, 'store'])->name('projects.store'); //Manda al database
Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit'); // Modifica
Route::put('/edit/{id}', [ProjectsController::class, 'update'])->name('projects.update'); // Aggiorna dopo aver modificato
Route::delete('/delete/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy'); // Elimina
Route::delete('/edit/{id}/delete-activity/{activity_id}', [ProjectsController::class, 'destroyActivity'])->name('projects.destroyActivity'); // Elimina attività
