<?php


use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\SocialAssistanceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


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


Route::apiResource('social-assistance', SocialAssistanceController::class);
Route::get('social-assistance/all/paginated', [SocialAssistanceController::class, 'getAllPaginated']);

Route::post('/social-assistance', [SocialAssistanceController::class, 'store']);
Route::put('/social-assistance/{id}', [SocialAssistanceController::class, 'update']);



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// EVENT
Route::apiResource('event', EventController::class);
Route::get('event/all/paginated', [EventController::class, 'getAllPaginated']);
Route::get('/event', [EventController::class, 'index']);

// FAMILY MEMBER
Route::apiResource('family-member', FamilyMemberController::class);
Route::get('/family-member/paginated', [FamilyMemberController::class, 'getAllPaginated']);
Route::get('/family-member', [FamilyMemberController::class, 'index']);

