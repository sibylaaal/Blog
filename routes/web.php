<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\blogscontroller;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/posts",[PostsController::class,"index"])->name("posts");
Route::get("/posts/{id}",[PostsController::class,"show"])->name("post");
Route::post("/posts/search",[PostsController::class,'search'])->name("search");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::prefix("dashboard")->group(function () {
        Route::get("/", [AdminController::class, 'index'])->name("dashboard");
        Route::get("/blogs", [blogscontroller::class, 'index'])->name("blogs");
        Route::get("/comments", [AdminController::class, 'index'])->name("comments");
        Route::get("/tags", [AdminController::class, 'index'])->name("tags");
        Route::get("/users", [AdminController::class, 'index'])->name("users");
        Route::get("/categories", [AdminController::class, 'index'])->name("categories");

    });










});

require __DIR__.'/auth.php';
