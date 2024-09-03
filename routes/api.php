<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix("/articles")->group(function(){
    Route::get("/",[ArticlesController::class, "index"]);
Route::post("/",[ArticlesController::class, "store"]);
Route::put("/{id}",[ArticlesController::class, "update"]);
Route::delete("/{id}",[ArticlesController::class, "destroy"]);
Route::get("/{id}",[ArticlesController::class, "show"]);
});


// Route::get("/articles",[ArticlesController::class, "index"]);
// Route::post("/articles",[ArticlesController::class, "store"]);
// Route::put("/articles/{id}",[ArticlesController::class, "update"]);
// Route::delete("/articles/{id}",[ArticlesController::class, "destroy"]);
// Route::get("/articles/{id}",[ArticlesController::class, "show"]);
