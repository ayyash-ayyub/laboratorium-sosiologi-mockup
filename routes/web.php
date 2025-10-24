<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.perform');
Route::get('/management-content', [AuthController::class, 'managementContent'])->name('management');
Route::get('/management-content/events/add', [AuthController::class, 'addEvent'])->name('management.events.create');
Route::get('/management-content/digital', [AuthController::class, 'listDigitalContent'])->name('management.digital.index');
Route::get('/management-content/digital/add', [AuthController::class, 'addDigitalContent'])->name('management.digital.create');
Route::get('/management-content/discussions/forum', [AuthController::class, 'discussionForum'])->name('management.discussions.forum');
Route::get('/management-content/discussions/moderation', [AuthController::class, 'discussionModeration'])->name('management.discussions.moderation');
Route::get('/management-content/blog', [AuthController::class, 'blogIndex'])->name('management.blog.index');
Route::get('/management-content/blog/add', [AuthController::class, 'blogCreate'])->name('management.blog.create');
Route::get('/management-content/publication/user', [AuthController::class, 'publicationUser'])->name('management.publication.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
