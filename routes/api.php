<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\NoteController;

Route::prefix('v1')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::get('students/{student}/notes', [NoteController::class, 'index']);
    Route::post('students/{student}/notes', [NoteController::class, 'store']);
});