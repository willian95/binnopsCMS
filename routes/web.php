<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;


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

Route::view("/", "login")->middleware("guest");

Route::get('/home', function () {
    return view('dashboard');
})->middleware("auth");

Route::post("login", [LoginController::class,"login"]);
Route::get("logout", [LoginController::class,"logout"])->name("logout");

Route::get("/blogs/create", [BlogController::class, "create"])->name("blog.create")->middleware("auth");
Route::get("/blogs/list", [BlogController::class, "list"])->name("blog.list")->middleware("auth");
Route::post("/blogs/store", [BlogController::class, "store"])->middleware("auth");
Route::post("/blogs/delete", [BlogController::class, "delete"])->middleware("auth");
Route::post("/blogs/update", [BlogController::class, "update"])->middleware("auth");
Route::get("/blogs/fetch/{page}", [BlogController::class, "fetch"])->middleware("auth");
Route::get("/blogs/edit/{id}", [BlogController::class, "edit"])->middleware("auth");

Route::post("/upload/picture", [ImageController::class, "upload"]);