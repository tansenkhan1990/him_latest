<?php
use App\Http\Middleware;
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
/*

Route::get('/', function () {
   return view('welcome');
});

*/
Auth::routes();
Route::get('/getUpdateProfile', 'HomeController@getUpdateProfile')->name('getUpdateProfile');
Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
Route::post('/insertUser', 'HomeController@insertUser')->name('insertUser');
Route::get('/showUser', 'HomeController@showUser')->name('showUser')->middleware('admin');
Route::get('/deleteUser/{id}', 'HomeController@deleteUser')->name('deleteUser')->middleware('admin');
Route::get('/userAdd', 'HomeController@userAdd')->name('userAdd')->middleware('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Userview@welcomepage')->name('welcome');
Route::get('/sendMail', 'Userview@sendMail')->name('sendMail');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/searchPerson', 'personInformation@searchPerson')->name('searchPerson');
Route::get('/event', 'event@getEventPage')->name('event');
Route::get('/searchEvent', 'event@searchEvent')->name('searchEvent');
Route::get('/showDetatilEvent/{id}', 'event@showDetatilEvent')->name('showDetatilEvent');
Route::get('/PersonDetailInfo/{id}', 'personInformation@PersonDetailInfo')
    ->name('PersonDetailInfo');
//Route::get('/reset', 'Userview@reset');
