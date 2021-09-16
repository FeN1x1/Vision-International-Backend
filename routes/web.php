<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum', 'verified'])->get('/{category}', [ApplicantsController::class, 'index'])->name('applicants_category');

Route::middleware(['auth:sanctum', 'verified'])->get('/', [ApplicantsController::class, 'index'])->name('applicants');

Route::middleware(['auth:sanctum', 'verified'])->get('/applicant/remove/{applicant}', [ApplicantsController::class, 'destroy'])->name('delete_applicant');

Route::middleware(['auth:sanctum', 'verified'])->get('/applicant/show/{applicant}', [ApplicantsController::class, 'show'])->name('show_applicant');

Route::middleware(['auth:sanctum', 'verified'])->post('/applicant/show/{applicant}', [ApplicantsController::class, 'setCategory'])->name('applicant_select_category');

Route::middleware(['auth:sanctum', 'verified'])->get('/applicant/download/{id}', [ApplicantsController::class, 'getDownloadLink'])->name('download_applicant_pdf');
