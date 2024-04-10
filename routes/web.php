<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\blogscontroller;
use App\Http\Controllers\Dashboard\categoriesController;
use App\Http\Controllers\Dashboard\commentsController;
use App\Http\Controllers\Dashboard\tagsControler;
use App\Http\Controllers\Dashboard\usersController;
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
        Route::get("/", [AdminController::class, 'index'])->name("dashboard")->middleware("multiacces");
        Route::get("/blogs", [BlogsController::class, 'index'])->name("blogs")->middleware("multiacces");
        Route::get("/comments", [commentsController::class, 'index'])->name("comments")->middleware("multiacces");
        Route::get("/tags", [tagsControler::class, 'index'])->name("tags")->middleware("isadmin");
        Route::get("/users", [usersController::class, 'index'])->name("users")->middleware("isadmin");
        Route::get("/categories", [categoriesController::class, 'index'])->name("categories")->middleware("isadmin");


    });











});

require __DIR__.'/auth.php';
