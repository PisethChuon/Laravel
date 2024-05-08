<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

// // show
// Route::get('/note', [NoteController::class, 'index'])->name('note.index');
// // create
// Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
// // store
// Route::post('/note', [NoteController::class, 'store'])->name('note.store');
// // show with id
// Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
// // edit with id
// Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
// // update with id
// Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');

Route::resource('note', NoteController::class);