<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;


Route::get('/', [FamilyController::class, 'index'])->name('home');
Route::get('/{id}', [FamilyController::class, 'index'])->name('main');
Route::post('save-family-details', [FamilyController::class, 'save']);

