<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\ApiProductController;

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
    'prefix' => 'produto',
    'as' => 'product.',
], function () {
    Route::get('/', [ApiProductController::class, 'index'])
        ->name('index');

    Route::get('{id}/ver', [ApiProductController::class, 'show'])
        ->name('show');

    Route::post('/', [ApiProductController::class, 'store'])
        ->name('store');

    Route::get('{id}/editar', [ApiProductController::class, 'edit'])
        ->name('edit');

    Route::put('{id}/editar', [ApiProductController::class, 'update'])
        ->name('update');

    Route::delete('{id}/excluir', [ApiProductController::class, 'delete'])
        ->name('delete');
});
