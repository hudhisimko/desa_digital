<?php

use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\SocialAssistanceRecipientController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\HttpCache\Store as HttpCacheStore;

Route::apiResource('user', UserController::class);
Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

Route::apiResource('head-of-family', HeadOfFamilyController::class);
Route::get('head-of-family/all/paginated', [HeadOfFamilyController::class, 'getAllPaginated']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('social-assistance-recipient', SocialAssistanceRecipientController::class);
Route::get('social-assistance-recipient/all/paginated', [SocialAssistanceRecipientController::class, 'getAllPaginated']);

