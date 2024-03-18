<?php

use App\Http\Controllers\dashboradConroller;
use App\Http\Controllers\logic;
use Illuminate\Support\Facades\Route;


Route::get('/', [dashboradConroller::class, 'index']);
Route::get('/logic', [logic::class,'logic']);
