<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramParticipantController;

// CRUD challenges
Route::get('/challenges', [ChallengeController::class, 'index']);
Route::post('/challenges', [ChallengeController::class, 'store']);
Route::get('/challenges/{id}', [ChallengeController::class, 'show']);
Route::put('/challenges/{id}', [ChallengeController::class, 'update']);
Route::delete('/challenges/{id}', [ChallengeController::class, 'destroy']);

// CRUD users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// CRUD companies
Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::put('/companies/{id}', [CompanyController::class, 'update']);
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

// CRUD programs
Route::get('/programs', [ProgramController::class, 'index']);
Route::post('/programs', [ProgramController::class, 'store']);
Route::get('/programs/{id}', [ProgramController::class, 'show']);
Route::put('/programs/{id}', [ProgramController::class, 'update']);
Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);

// CRUD program participant
Route::get('/program-participants', [ProgramParticipantController::class, 'index']);
Route::post('/program-participants', [ProgramParticipantController::class, 'store']);
Route::get('/program-participants/{id}', [ProgramParticipantController::class, 'show']);
Route::put('/program-participants/{id}', [ProgramParticipantController::class, 'update']);
Route::delete('/program-participants/{id}', [ProgramParticipantController::class, 'destroy']);
