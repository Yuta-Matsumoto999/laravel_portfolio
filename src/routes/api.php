<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// user register時のEmail存在チェック
Route::get('/check/userEmail/exists/{email?}', [RegisteredUserController::class, 'checkUserEmailExists']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
