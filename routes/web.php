
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
    Redis::set('kave', 'ko'); 
});
Route::get('/', 'FrontendController@welcome');
// ->middleware('verified')

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
