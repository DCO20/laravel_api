<?php

use App\Http\Controllers\Api\Auth\AuthUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/token', [AuthUserController::class, 'auth']);

Route::group([
    'middleware' => ['auth:sanctum'],
], function () {
    Route::get('/auth/me', [AuthUserController::class, 'me']);
    Route::post('/auth/logout', [AuthUserController::class, 'logout']);
});
