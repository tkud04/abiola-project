<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [MainController::class,'getIndex']);


//Authentication
Route::get('login', [LoginController::class,'getLogin']);
Route::get('signup', [LoginController::class,'getSignup']);
Route::post('login', [LoginController::class,'postLogin']);
Route::post('signup', [LoginController::class,'postSignup']);
Route::get('bye', [LoginController::class,'getLogout']);

//Dashboard
Route::get('dashboard', [MainController::class,'getDashboard']);
Route::get('profile', [MainController::class,'getProfile']);
Route::post('profile', [MainController::class,'postProfile']);

//Classes and Subjects
Route::get('classes', [MainController::class,'getClasses']);
Route::get('class', [MainController::class,'getSingleClass']);
Route::get('new-class', [MainController::class,'getNewClass']);
Route::post('new-class', [MainController::class,'postNewClass']);
Route::get('subjects', [MainController::class,'getSubjects']);
Route::get('new-subject', [MainController::class,'getNewSubject']);
Route::post('new-subject', [MainController::class,'postNewSubject']);
Route::get('subject', [MainController::class,'getSubject']);
Route::get('new-topic', [MainController::class,'getNewTopic']);
Route::post('new-topic', [MainController::class,'postNewTopic']);
Route::get('topic', [MainController::class,'getTopic']);