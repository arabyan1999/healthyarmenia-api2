<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BaseController;
use \Illuminate\Support\Facades\App;
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

//Route::get('/get_translation/{locale}', [BaseController::class, 'get_translation']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/change_language/{lang}', [BaseController::class, 'change_current_language']);
Route::get('/get_translations/{key}', [BaseController::class, 'get_translations']);
Route::get('/get_products/{lang}', [BaseController::class, 'get_products']);
Route::get('/get_product/{key}', [BaseController::class, 'get_product']);
Route::get('/get_diseases/{lang}', [BaseController::class, 'get_diseases']);
Route::get('/get_disease/{key}', [BaseController::class, 'get_disease']);
Route::post('/create_call_request', [BaseController::class, 'create_call_request']);
Route::post('/add_product', [BaseController::class, 'add_product']);
Route::post('/add_disease', [BaseController::class, 'add_disease']);
