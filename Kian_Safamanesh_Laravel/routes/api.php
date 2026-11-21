<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{AuthController,ItemController,AdminUserController};
Route::post('/register',[AuthController::class,'register']); Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
 Route::get('/me',[AuthController::class,'me']); Route::post('/logout',[AuthController::class,'logout']);
 Route::apiResource('items',ItemController::class);
 Route::middleware(function($request,$next){ abort_unless($request->user()?->role==='admin',403,'فقط مدیر'); return $next($request); })->prefix('admin')->group(function(){Route::get('/users',[AdminUserController::class,'index']);Route::patch('/users/{user}/role',[AdminUserController::class,'updateRole']);Route::delete('/users/{user}',[AdminUserController::class,'destroy']);});
});
