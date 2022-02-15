<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\AutheurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ADD NEW BOOK
Route::post('book', [BookController::class,'addMember']);
// BOOK LIST
Route::get('book',[BookController::class,'BookList']);
//  SHOW BOOK EDITIONS
Route::get('bookedition/{id}', [BookController::class,'showBookEdition']);
//  GET BOOK AUTEUR
Route::get('bookauteur/{id}', [BookController::class,'showBookAuteur']);
// DELETE BOOK 
Route::delete('book/{id}', [BookController::class,'DeleteBook']);
Route::get('book/{id}', [BookController::class,'showOneBook']);
// SEARCH FOR A BOOK    
Route::get('searchbook/{titre}',[BookController::class,'SearchBook']);
//  SHOW A BOOK COMMNET S 
Route::get('bookcomment/{id}',[BookController::class,'showBookComments']);


// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//  :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//  ADD NEW ADDTION TO A BOOK


Route::post('edition/{id}', [EditionController::class,'addEdtition']);
Route::get('edition', [EditionController::class,'showEditions']);
Route::delete('edition/{id}', [EditionController::class,'DeleteEdition']);




// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//  :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//  ADD AUTHEUR TO BOOK
Route::post('auteur/{id}', [AutheurController::class,'addAutheur']);
// AUTEUR LIST
Route::get('auteur',[AutheurController::class,'AuteurList']);
// Delete Auteur
Route::delete('auteur/{id}',[AutheurController::class,'DeleteAuteur']);


// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::User Routers:::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::post('users', [UserController::class,'Register']);
Route::get('users', [UserController::class,'showUser']);
Route::post('login', [UserController::class,'Login']);
Route::delete('users/{id}', [UserController::class,'DeleteUser']);



/// Add Commnet 
Route::post('comment/{id}', [CommentController::class,'addCommnet']);
Route::get('comment', [CommentController::class,'showCommnet']);
