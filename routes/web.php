<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Admin routes
    Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store');
    Route::delete('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');

    Route::get('librarians', [LibrarianController::class, 'index'])->name('librarians.index');
    Route::get('librarians/create', [LibrarianController::class, 'create'])->name('librarians.create');
    Route::post('librarians', [LibrarianController::class, 'store'])->name('librarians.store');
    Route::delete('librarians/{librarian}', [LibrarianController::class, 'destroy'])->name('librarians.destroy');
});

Route::prefix('librarian')->group(function () {
    // Librarian routes
    Route::get('collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::get('collections/create', [CollectionController::class, 'create'])->name('collections.create');
    Route::post('collections', [CollectionController::class, 'store'])->name('collections.store');
    Route::get('collections/{collection}/edit', [CollectionController::class, 'edit'])->name('collections.edit');
    Route::put('collections/{collection}', [CollectionController::class, 'update'])->name('collections.update');
    Route::delete('collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');

    Route::get('access-requests', [AccessRequestController::class, 'index'])->name('access-requests.index');
    Route::post('access-requests/{accessRequest}/approve', [AccessRequestController::class, 'approve'])->name('access-requests.approve');
    Route::post('access-requests/{accessRequest}/reject', [AccessRequestController::class, 'reject'])->name('access-requests.reject');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Librarian Routes
Route::get('/librarian/dashboard', [LibrarianController::class, 'dashboard'])->name('librarian.dashboard');