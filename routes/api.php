<?php

use App\Http\Controllers\DevelopmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\SocialAssistanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FamilyMemberController;


Route::apiResource('user', UserController::class);
Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

Route::apiResource('head-of-family', HeadOfFamilyController::class);
Route::get('head-of-family/all/paginated', [HeadOfFamilyController::class, 'getAllPaginated']);

Route::apiResource('social-assistance', SocialAssistanceController::class);
Route::get('social-assistance/all/paginated', [SocialAssistanceController::class, 'getAllPaginated']);


Route::apiResource('event', EventController::class);
Route::get('event/all/paginated', [EventController::class, 'getAllPaginated']);

Route::apiResource('family-member', FamilyMemberController::class);
Route::get('family-member/paginated', [FamilyMemberController::class, 'getAllPaginated']);

Route::apiResource('development', DevelopmentController::class);
Route::get('event/all/paginated', [DevelopmentController::class, 'getAllPaginated']);

Route::post('/development', [DevelopmentController::class, 'store']);

