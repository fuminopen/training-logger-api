<?php

use App\Http\Controllers\BodyPartController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('exercises', ExerciseController::class);

Route::resource('body_parts', BodyPartController::class);

Route::resource('workouts', WorkoutController::class);
