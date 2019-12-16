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
//person Controller
Route::get('/participants/{id}', 'event@participants')->name('participants');
Route::get('/personStay','personInformation@PersonDetailInfo');
Route::get('/PersonDetailInfo/{id}', 'personInformation@PersonDetailInfo')
    ->name('PersonDetailInfo');
Route::get('/searchPerson', 'personInformation@searchPerson')->name('searchPerson');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//end person controller

//start homecontroller
Route::get('/getUpdateProfile', 'HomeController@getUpdateProfile')->name('getUpdateProfile');
Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
Route::post('/insertUser', 'HomeController@insertUser')->name('insertUser');
Route::get('/showUser', 'HomeController@showUser')->name('showUser')->middleware('admin');
Route::get('/deleteUser/{id}', 'HomeController@deleteUser')->name('deleteUser')->middleware('admin');
Route::get('/userAdd', 'HomeController@userAdd')->name('userAdd')->middleware('admin');
Route::get('/home', 'HomeController@index')->name('home');

//end home controller
//autocomplete

Route::get('autocompleteFirstName', 'event@autocompleteFirstName')->name('autocompleteFirstName');
Route::get('autocompleteLastName', 'event@autocompleteLastName')->name('autocompleteLastName');
Route::get('autocompleteuniversity', 'event@autocompleteuniversity')->name('autocompleteuniversity');
Route::get('autosearchEvent', 'event@autosearchEvent')->name('autosearchEvent');

//end autocomplete
//start swb
Route::get('/swb', 'event@swb')->name('swb');
//end swb

//start phone
Route::get('/phone', 'event@phone')->name('phone');
//end phone

//start cost
Route::get('/cost', 'event@cost')->name('cost');
//end cost

//start hotel
Route::get('/hotelOverview', 'event@hotelOverview')->name('hotelOverview');
Route::get('/hotelActive', 'event@hotelActive')->name('hotelActive');
//end hotel

//start Userview controller

Route::get('/', 'Userview@welcomepage')->name('welcome');
Route::get('/sendMail', 'Userview@sendMail')->name('sendMail');

//end userview controller

//start event controller

Route::get('/event', 'event@getEventPage')->name('event');
Route::get('/autosuggest', 'event@autosuggest')->name('autosuggest');
Route::get('/searchEvent', 'event@searchEvent')->name('searchEvent');
Route::get('/showDetatilEvent/{id}', 'event@showDetatilEvent')->name('showDetatilEvent');

//end event controller