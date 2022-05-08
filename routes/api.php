<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Userinformation;
use App\Http\Controllers\UserinformationController;
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

// Route::resource('projects', ProjectController::class);



//Public Route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/projects/search/{name}', [ProjectController::class, 'search']);

Route::get('/userinfo', [UserinformationController::class, 'index']);
Route::get('/userinfo/{id}', [UserinformationController::class, 'show']);
Route::get('/userinfo/search/{name}', [UserinformationController::class, 'search']);


//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

    Route::post('/userinfo', [UserinformationController::class, 'store']);
    Route::put('/userinfo/{id}', [UserinformationController::class, 'update']);


    Route::post('/logout', [AuthController::class, 'logout']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
