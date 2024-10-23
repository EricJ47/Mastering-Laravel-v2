
<?php

use App\Events\MyEvent;
use App\Events\UserRegistered;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Jobs\SendMail;
use App\Mail\PostPublished;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// CRUD POSTS 

Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts/{id}/kill', [PostController::class, 'kill'])->name('posts.kill');

    Route::resource('posts', PostController::class);
});

Route::get('send-mail', function () {
    // Mail::raw('hello aja gak sih, testing email kedua', function ($message) {
    
    // Mail::send('Html.view', $data, function ($message) {
    //     $message->from('john@johndoe.com', 'John Doe');
    //     $message->sender('john@johndoe.com', 'John Doe');
    //     $message->to('john@johndoe.com', 'John Doe');
    //     $message->cc('john@johndoe.com', 'John Doe');
    //     $message->bcc('john@johndoe.com', 'John Doe');
    //     $message->replyTo('john@johndoe.com', 'John Doe');
    //     $message->subject('Subject');
    //     $message->priority(3);
    //     $message->attach('pathToFile');
    // });

    SendMail::dispatch();
    dd('sent');
});

Route::get('user-registerd', function () {
    $email = 'johny@sin.com';
    event(new UserRegistered($email));
    dd('sent');
});

Route::get('event', function () {
    return view('create-notification');
});
Route::post('event', function (Request $request) 
{
    $message = Request::input('message');
    event(new MyEvent($message));

    // dd($message);
    return redirect()->back();
})->name('event.message');


Route::get('listener', function () {
    return view('get-notification');
});

// en,id
Route::get('greeting/{locale}', function ($locale) {

    App::setLocale($locale);

    return view('greeting');
})->name('greeting');






// Route::get('user-data', function () {
//     Auth::user();
//     // return response()->json(['user' => Auth::user()]);
//     return auth()->user();
// });