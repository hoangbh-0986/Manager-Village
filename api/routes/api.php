<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\CraftVillageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', AuthController::class);
});

Route::put('/setRole/{id}', [AuthController::class, 'setRole']);
Route::get('/get-users', [AuthController::class, 'getUsers']);

Route::get('/expert', [ExpertController::class, 'GetExpert']);
Route::post('/expert', [ExpertController::class, 'CreateExpert']);
Route::get('/expert/{id}', [ExpertController::class, 'DetailExpert']);
Route::put('/expert/{id}', [ExpertController::class, 'UpdateExpert']);
Route::delete('/expert/{id}', [ExpertController::class, 'DeleteExpert']);

Route::get('/ward', [WardController::class, 'GetWard']);
Route::post('/ward', [WardController::class, 'CreateWard']);
Route::get('/ward/{id}', [WardController::class, 'DetailWard']);
Route::put('/ward/{id}', [WardController::class, 'UpdateWard']);
Route::delete('/ward/{id}', [WardController::class, 'DeleteWard']);

Route::get('/craft_village', [CraftVillageController::class, 'GetCraftVillage']);
Route::post('/craft_village', [CraftVillageController::class, 'CreateCraftVillage']);
Route::get('/craft_village/{id}', [CraftVillageController::class, 'DetailCraftVillage']);
Route::put('/craft_village/{id}', [CraftVillageController::class, 'UpdateCraftVillage']);
Route::delete('/craft_village/{id}', [CraftVillageController::class, 'DeleteCraftVillage']);


Route::get('/job', [JobController::class, 'GetJob']);
Route::post('/job', [JobController::class, 'CreateJob']);
Route::get('/job/{id}', [JobController::class, 'DetailJob']);
Route::put('/job/{id}', [JobController::class, 'UpdateJob']);
Route::delete('/job/{id}', [JobController::class, 'DeleteJob']);

Route::get('/post', [PostController::class, 'GetPost']);
Route::post('/post', [PostController::class, 'CreatePost']);
Route::get('/post/{id}', [PostController::class, 'DetailPost']);
Route::put('/post/{id}', [PostController::class, 'UpdatePost']);
Route::delete('/post/{id}', [PostController::class, 'DeletePost']);
Route::get('/post-job/{id}', [PostController::class, 'DetailPostJob']);
Route::get('/post-expert/{id}', [PostController::class, 'DetailPostExpert']);
Route::get('/post-ward/{id}', [PostController::class, 'DetailPostWard']);
Route::get('/post-craft_village/{id}', [PostController::class, 'DetailPostJCraftVillage']);
