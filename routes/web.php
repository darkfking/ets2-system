<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/karta', 'KartaController@index')->name('karta');
Route::resource('cars', 'CarsController');
Route::resource('trailers', 'TrailersController');


//ciezarowki
Route::get('cars/create', [
    'uses' => 'CarsController@create',
    'as' => 'cars.create'
]);

Route::post('cars/store',[
    'uses' => 'CarsController@store',
    'as' => 'cars.store'
]);

Route::delete('cars/{car}', [
    'uses' => 'CarsController@destroy',
    'as' => 'cars.delete'
]);

Route::get('cars/edit/{car}', [
    'uses' => 'CarsController@edit',
    'as' => 'cars.edit'
]);

//naczepy

Route::get('trailers/create', [
    'uses' => 'TrailersController@create',
    'as' => 'trailers.create'
]);

Route::post('trailers/store',[
    'uses' => 'TrailersController@store',
    'as' => 'trailers.store'
]);

Route::delete('trailers/{trailer}', [
    'uses' => 'TrailersController@destroy',
    'as' => 'trailers.delete'
]);

Route::get('trailers/edit/{trailer}', [
    'uses' => 'TrailersController@edit',
    'as' => 'trailers.edit'
]);

 //firma

Route::get('firms/edit/{firm}', [
    'uses' => 'FirmsController@edit',
    'as' => 'firms.edit'
]);

Route::put('firms/{firm}', [
    'uses' => 'FirmsController@update',
    'as' => 'firms.update'
]);

Route::get('firms/ranga/{user}', [
    'uses' => 'FirmsController@ranga',
    'as' => 'firms.ranga'
]);

Route::put('firms/r/{user}', [
    'uses' => 'FirmsController@rangaup',
    'as' => 'firms.rangaup'
]);

Route::get('firms/stan/{firm}', [
    'uses' => 'FirmsController@stan',
    'as' => 'firms.stan'
]);

Route::put('firms/u/{firm}', [
    'uses' => 'FirmsController@stanup',
    'as' => 'firms.stanup'
]);

Route::delete('firms/{user}', [
    'uses' => 'FirmsController@destroy',
    'as' => 'firms.delete'
]);
//karta

Route::get('karta/zmien/{user}', [
    'uses' => 'KartaController@zmien',
    'as' => 'karta.zmien'
]);

Route::put('karta/zmienHaslo/{user}', [
    'uses' => 'KartaController@zmienHaslo',
    'as' => 'karta.zmienHaslo'
]);

Route::get('karta/mapy/{user}', [
    'uses' => 'KartaController@mapy',
    'as' => 'karta.mapy'
]);

Route::put('karta/mapyup/{user}', [
    'uses' => 'KartaController@updatemapy',
    'as' => 'karta.updatemapy'
]);

//rozpiski

Route::get('rozpiski/create', [
    'uses' => 'RozpiskiController@create',
    'as' => 'rozpiski.create'
]);

Route::post('rozpiski/store',[
    'uses' => 'RozpiskiController@store',
    'as' => 'rozpiski.store'
]);
Route::get('rozpiski', [
    'uses' => 'RozpiskiController@index',
    'as' => 'rozpiski.index'
]); 
Route::get('rozpiski/edytuj', [
    'uses' => 'RozpiskiController@edytuj',
    'as' => 'rozpiski.edytuj'
]); 

Route::get('rozpiski/admin', [
    'uses' => 'RozpiskiController@admin',
    'as' => 'rozpiski.admin'
]); 
Route::get('rozpiski/edit/{rozpiska}', [
    'uses' => 'RozpiskiController@edit',
    'as' => 'rozpiski.edit'
]);

Route::put('rozpiski/{rozpiska}', [
    'uses' => 'RozpiskiController@update',
    'as' => 'rozpiski.update'
]);

Route::get('rozpiski/accept/{rozpiska}', [
    'uses' => 'RozpiskiController@accept',
    'as' => 'rozpiski.accept'
]);

Route::get('rozpiski/reject/{rozpiska}', [
    'uses' => 'RozpiskiController@reject',
    'as' => 'rozpiski.reject'
]);

Route::resource('firms', 'FirmsController');