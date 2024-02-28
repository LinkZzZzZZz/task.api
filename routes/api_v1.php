<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;


Route::apiResource('tasks', TaskController::class);
