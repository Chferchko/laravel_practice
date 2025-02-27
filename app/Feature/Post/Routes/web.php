<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Feature\Post\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::post('/posts/{post}', [PostController::class, 'restore'])->withTrashed()->name('post.restore');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
