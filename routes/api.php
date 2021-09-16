<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\MailController;

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

Route::post('/applicants', [ApplicantsController::class, 'store']);

Route::post('/contact', [MailController::class, 'sendContactMail']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
