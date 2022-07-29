<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\Api\ApiCategoryController;

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

Route::group([
    'prefix' => 'categoria',
    'as' => 'category.',
], function () {
    Route::get('/', [ApiCategoryController::class, 'index'])
        ->name('index');

    Route::get('{id}/ver', [ApiCategoryController::class, 'show'])
        ->name('show');

    Route::post('/', [ApiCategoryController::class, 'store'])
        ->name('store');

    Route::get('{id}/editar', [ApiCategoryController::class, 'edit'])
        ->name('edit');

    Route::put('{id}/editar', [ApiCategoryController::class, 'update'])
        ->name('update');

    Route::delete('{id}/excluir', [ApiCategoryController::class, 'delete'])
        ->name('delete');
});
