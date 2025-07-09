<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FamilyMemberController;

// USER
Route::apiResource('user', UserController::class);
Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

// HEAD OF FAMILY
Route::apiResource('head-of-family', HeadOfFamilyController::class);
Route::get('head-of-family/all/paginated', [HeadOfFamilyController::class, 'getAllPaginated']);

// EVENT
Route::apiResource('event', EventController::class);
Route::get('event/all/paginated', [EventController::class, 'getAllPaginated']);
Route::get('/event', [EventController::class, 'index']);

// FAMILY MEMBER
Route::apiResource('family-member', FamilyMemberController::class);
Route::get('/family-member/paginated', [FamilyMemberController::class, 'getAllPaginated']);
Route::get('/family-member', [FamilyMemberController::class, 'index']);
