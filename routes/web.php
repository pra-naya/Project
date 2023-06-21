<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;

use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// All recipes
Route::get('/', [RecipeController::class, 'index']);

// Show Create Form
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware(['auth', 'verified']);

// Store Recipe Data
Route::post('/recipes', [RecipeController::class, 'store']);

// Show Edit Form
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit']);

// Update Recipe
Route::put('recipes/{recipe}', [RecipeController::class, 'update']);

// Delete Recipe
Route::delete('recipes/{recipe}', [ RecipeController::class, 'destroy']);

// Single recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// Print Recipe
Route::get('recipes/{recipe}/print', [RecipeController::class, 'print']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Show all Recipes of the Logged in User
Route::get('/abc', [RecipeController::class, 'abc']);

// Store Comment
Route::post('/comments', [CommentController::class, 'store']);

// Delete Comment
Route::delete('/comments/{comment}/delete', [CommentController::class, 'destroy']);

// Submit Rating
Route::post('/rating', [RatingController::class, 'store'])->middleware('auth');



// Send the Email Verfication Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Handle Email Verification Request
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
