<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SampleController;
use App\Mail\OrderShip;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/contact', function () {
    $posts = Post::all();
    return view('contact', compact('posts'));
});


// Mailing Mailtrap.io
Route::get('send-mail', function () {
    // Mail::raw('hello aja gak sih, testing email kedua', function ($message) {
    //     // $message->subject('test mail')->to('yOgjK@example.com');
    //     $message->subject('test mail');
    //     $message->to('oyyoyoygjK@example.com');
    // });

    Mail::send(new OrderShip());
    dd('sent');
    });  

Route::get('get-session', function (Request $request) {
    // $data = session()->all();

    $data = $request->session()->all();

    // $data = $request->session()->get('_token');
    dd($data);
    
    // dd(session()->all());
});

// Http Session
Route::get('save-session', function (Request $request) {
    // $request->session()->put('user_token', '3123');
    // $request->session()->put(['user_status' => 'active']);
    // Session(['user_ip' => '127.0.0.1']);
    return redirect('get-session');
});
Route::get('delete-session', function (Request $request) {
    // $request->session()->forget('user_token');
    // Session()->forget('user_ip');
    // $request->session()->forget(['user_status', 'user_ip']);
    session()->flush();
    return redirect('get-session');
});
Route::get('flash', function (Request $request) {
    $request->session()->flash('status', 'Data Saved');
    return redirect('get-session');
});

Route::get('forget-cache', function () {
    Cache::forget('posts');
    return 'cache cleared';
});



