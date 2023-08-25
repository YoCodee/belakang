<?php

use App\Http\Controllers\jobVacanciController;
use App\Http\Controllers\societiesController;
use App\Http\Controllers\societiesJobApplyController;
use App\Http\Controllers\validationController;
use App\Http\Middleware\checkToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([checkToken::class])->group( function() {
    Route::post('/v1/auth/login', [societiesController::class, 'login']);
    Route::post('/v1/auth/logout', [societiesController::class, 'logout']);
    Route::post('/v1/validations', [validationController::class, 'Validation']);
    Route::get('/v1/validation', [validationController::class, 'getValidation']);
    Route::get('/v1/job_vacancies', [jobVacanciController::class, 'jobVacanci']);
    Route::get('/v1/job_vacancies/{id}', [jobVacanciController::class, 'getVacanciById']);
    Route::post('/v1/applications', [societiesJobApplyController::class, 'jobApply']);
    Route::get('/v1/applications', [societiesJobApplyController::class, 'getJobApply']);
});
