<?php

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

use App\Models\Task;

// Route::get('/', function(){
//     Artisan::call('user:mail', [
//         'id' => 1,
//         '--flag' => 'Flag user'
//     ]);
//     return view('welcome');
// });


Route::get('/channels', function(){
    return view('welcome');
});
Route::get('/pusher', function(){
    App\Events\NewPost::dispatch('Eduardo');
});

Route::get('/', function () {
    return redirect()->route('posts');
});

Route::get('/users', function(){
    $user = App\User::with(['posts' => function($q){
        $q->where('id','=',160);
    }])->whereId(1)->get();
    dd($user);
    // dd(App\User::with(['posts'])->first()->posts->first()->id);
});

Route::get('/query', function(){
    return DB::table('users')->join('posts','users.id','posts.user_id')
    ->select('users.id','users.name','posts.title','posts.content')
    ->get();
});
Route::get('/crearPost', function(){
    return \App\Models\Post::create([
        'title' => 'Nuevo post 19',
        'content' => 'contenido del nuevo post',
        'user_id' => 1
    ]);
});
Route::get('/updPost', function(){
    $post = \App\Models\Post::find(1);
    $post->title = 'Titulo actualizado del post';
    $post->save();
    return $post;
});

// ->except(['create']);


Route::get('/paypal', function(){
    return Payment::doSomething();
});


Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('my/posts', 'PostController@myPosts')->name('posts.my');
});

Route::resource('posts', 'PostController')->names(['index'=>'posts']);

use App\Jobs\UserEmailWelcome;
use Illuminate\Support\Facades\DB;

Route::get('/mail', function(){
    UserEmailWelcome::dispatch(App\User::find(1))->delay(now()->addSeconds(10));
    return 'done';
});


Route::get('/notify/{user}', 'HomeController@notify');
Route::get('/room/{user}', 'HomeController@room');

Route::get('todo', function(){
    return view('welcome');
});
Route::get('/tasks', function(){
    return Task::all()->pluck('name');
});
Route::post('/task', function(){
    $task = Task::create(request()->all());
    App\Events\NewPost::dispatch($task);
    return $task;
});
