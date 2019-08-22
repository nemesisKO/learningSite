
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

Route::get('/redis', function () {
    // Redis::sadd('user:1:series:18', '89');
    Redis::del('user:1:series:18');
    // dd(Redis::smembers('user:1:series:18'));
    // Redis::set('user', 2);
    // dd(Redis::get('user'));
});

Route::get('/', 'FrontendController@welcome');
// ->middleware('verified')
Route::get('/series/{series}', 'FrontendController@series')->name('series');
Route::get('/watch-series/{series}', 'WatchSeriesController@index')->name('series.learning');
Route::get('/series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch');
Route::post('/series/complete-lesson/{lesson}', 'WatchSeriesController@completeLesson');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

// Route::get('{series_by_id}', function (\App\Series $series) {
//     dd($series);
// });

// Route::middleware('admin')->prefix('admin')->group(function () {

// });

Auth::routes();
// ['verify' => true]

Route::get('/home', 'HomeController@index')->name('home');
