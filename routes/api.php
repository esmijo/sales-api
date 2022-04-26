<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SystemController;
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

//Public Routes
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/reports', [ReportController::class, 'index']);
Route::get('/reports/{id}', [ReportController::class, 'show']);
Route::get('/reports/search/{branch}', [ReportController::class, 'search']);

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/reports/search_2/{serial}', [ReportController::class, 'search_2']);
});

//ISMS-BACKUP-DB-ROUTES

Route::get('/transactions', [SystemController::class, 'index']);
Route::get('/transactions/wb', [SystemController::class, 'TransactionWithBranch']);
Route::get('/inventory', [InventoryController::class, 'index']);

Route::get('/transactions/sf', [SystemController::class, 'selected_fields']);
Route::get('/transactions/trans_sum', [SystemController::class, 'trans_sum']);

Route::get('/transactions/{id}', [SystemController::class, 'show']);
Route::get('/transactions/search/{customer}', [SystemController::class, 'search']);
