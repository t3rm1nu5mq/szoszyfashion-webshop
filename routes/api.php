<?php

    use App\Http\Controllers\ProductController;
    use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->group(function () {
    Route::post('/create', [ProductController::class, 'store']);
    Route::post('/delete', [ProductController::class, 'destroy']);
    Route::get('/all', [ProductController::class, 'index']);
    Route::post('/update', [ProductController::class, 'update']);
});
