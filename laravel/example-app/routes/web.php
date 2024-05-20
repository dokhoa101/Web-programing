<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);

// category section

Route::get('view_category', [AdminController::class,'view_category'])->middleware(['auth','admin']);
Route::post('add_category', [AdminController::class,'add_category'])->middleware(['auth','admin']);
Route::get('delete_category/{id}', [AdminController::class,'delete_category'])->middleware(['auth','admin']);
Route::get('edit_category/{id}', [AdminController::class,'edit_category'])->middleware(['auth','admin']);
Route::post('update_category/{id}', [AdminController::class,'update_category'])->middleware(['auth','admin']);

// league section

Route::get('view_league', [AdminController::class,'view_league'])->middleware(['auth','admin']);
Route::post('add_league', [AdminController::class,'add_league'])->middleware(['auth','admin']);
Route::get('delete_league/{id}', [AdminController::class,'delete_league'])->middleware(['auth','admin']);
Route::get('edit_league/{id}', [AdminController::class,'edit_league'])->middleware(['auth','admin']);
Route::post('update_league/{id}', [AdminController::class,'update_league'])->middleware(['auth','admin']);

// club section

Route::get('view_club', [AdminController::class,'view_club'])->middleware(['auth','admin']);
Route::post('add_club', [AdminController::class,'add_club'])->middleware(['auth','admin']);
Route::get('delete_club/{id}', [AdminController::class,'delete_club'])->middleware(['auth','admin']);
Route::get('edit_club/{id}', [AdminController::class,'edit_club'])->middleware(['auth','admin']);
Route::post('update_club/{id}', [AdminController::class,'update_club'])->middleware(['auth','admin']);

// player section

Route::get('view_player', [AdminController::class,'view_player'])->middleware(['auth','admin']);
Route::post('add_player', [AdminController::class,'add_player'])->middleware(['auth','admin']);
Route::get('delete_player/{id}', [AdminController::class,'delete_player'])->middleware(['auth','admin']);
Route::get('edit_player/{id}', [AdminController::class,'edit_player'])->middleware(['auth','admin']);
Route::post('update_player/{id}', [AdminController::class,'update_player'])->middleware(['auth','admin']);

// news section

Route::get('add_news', [AdminController::class,'add_news'])->middleware(['auth','admin']);
Route::get('view_news', [AdminController::class,'view_news'])->middleware(['auth','admin']);
Route::post('upload_news', [AdminController::class,'upload_news'])->middleware(['auth','admin']);
Route::get('delete_news/{id}', [AdminController::class,'delete_news'])->middleware(['auth','admin']);
Route::get('edit_news/{id}', [AdminController::class,'edit_news'])->middleware(['auth','admin']);
Route::post('update_news/{id}', [AdminController::class,'update_news'])->middleware(['auth','admin']);
Route::get('news_search', [AdminController::class,'news_search'])->middleware(['auth','admin']);




