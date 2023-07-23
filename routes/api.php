<?php

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


// User routes
Route::post('/users', 'App\Http\Controllers\API\UserController@store'); // Create a new user
Route::get('/users', 'App\Http\Controllers\API\UserController@index'); // Get all users
Route::get('/users/{user}', 'App\Http\Controllers\API\UserController@show'); // Get a specific user
Route::put('/users/{user}', 'App\Http\Controllers\API\UserController@update'); // Update a user
Route::delete('/users/{user}', 'App\Http\Controllers\API\UserController@destroy'); // Delete a user
// Admin routes
Route::post('login', [\App\Http\Controllers\API\LoginController::class, 'login']);
Route::middleware('auth:sanctum')->get('/admins/users', 'App\Http\Controllers\API\AdminController@filterUsersByEmailAndDivision');
