<?php
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\V2\ProductController;
    use App\Http\Controllers\Api\V2\CategoryController;
    
    /*
    |--------------------------------------------------------------------------
    | API V2 Routes
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
    
    Route::group(['middleware' => 'throttle:2,1'], function () {
        Route::apiResource('categories', CategoryController::class);
    });
    
    Route::get('products', [ProductController::class, 'index']);
    
