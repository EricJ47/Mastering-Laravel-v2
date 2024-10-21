<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SampleController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Facades\CustomFacade;

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

Route::get('/', function () {
    return view('welcome');
});


// group middleware
Route::group(['middleware' => 'authchecking'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
});


Route::get('/sample', [SampleController::class, 'index'])->name('sample');

Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/kill', [PostController::class, 'kill'])->name('posts.kill');

Route::resource('posts', PostController::class);

Route::get('check', function () {
    return CustomFacade::SomeMethod();
});

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('/slug', function () {
    $title = 'how to create Blog title testing ';
    $slug = genSlug($title);

    return $slug;
});

Route::get('/user/{user:email}', function (User $user) {
    return $user;
});

Route::get('/unavailable', function () {
    return view('unavailable');
})->name('unavailable');




