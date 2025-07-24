<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\SocialAssistanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\ProfileController;

    Route::apiResource('user', UserController::class);
    Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

    Route::apiResource('head-of-family', HeadOfFamilyController::class);
    Route::get('head-of-family/all/paginated', [HeadOfFamilyController::class, 'getAllPaginated']);

    Route::apiResource('social-assistance', SocialAssistanceController::class);
    Route::get('social-assistance/all/paginated', [SocialAssistanceController::class, 'getAllPaginated']);
    Route::post('/social-assistance', [SocialAssistanceController::class, 'store']);
    Route::put('/social-assistance/{id}', [SocialAssistanceController::class, 'update']);

    Route::apiResource('event', EventController::class);
    Route::get('event/all/paginated', [EventController::class, 'getAllPaginated']);
    Route::get('/event', [EventController::class, 'index']);

    Route::apiResource('family-member', FamilyMemberController::class);
    Route::get('/family-member/paginated', [FamilyMemberController::class, 'getAllPaginated']);
    Route::get('/family-member', [FamilyMemberController::class, 'index']);

    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('profile', [ProfileController::class, 'store']);
    Route::put('profile', [ProfileController::class, 'update']);



