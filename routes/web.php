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


use Illuminate\Support\Facades\Route;
/*
Route::group(['middleware' => ['web']], function () {
    if(isset($_GET['nomination'])) {
        Route::get('/', 'VotesController@nomination');
        Route::post('/', 'VotesController@nominationStore');
    } elseif(time() >= mktime(23, 0, 0, 1, 31, 2023) && time() < mktime(23, 0, 0, 2, 14, 2023)) {
        Route::get('/', 'VotesController@beforeIndex');
    } elseif(time() >= mktime(23, 0, 0, 12, 4, 2022) && time() < mktime(23, 0, 0, 1, 31, 2023)) {
        Route::get('/', 'VotesController@nomination');
        Route::post('/', 'VotesController@nominationStore');
    } elseif(time() >= mktime(23, 0, 0, 2, 14, 2023) && time() < mktime(23, 0, 0, 3, 31, 2023)) {
        Route::get('/', 'VotesController@index');
        Route::post('/', 'VotesController@store');
        Route::get('/{hash}', 'VotesController@confirm')->where('hash', '[a-f0-9]{32}');
    } elseif(time() >= mktime(23, 0, 0, 3, 31, 2023) && time() < mktime(23, 0, 0, 5, 31, 2023)) {
        Route::get('/', 'VotesController@afterIndex');
    } else {
        Route::get('/', 'VotesController@results');
    }
});
*/
Route::get('/', 'VotesController@results');

Route::get('/archive/{year}', 'VotesController@archive')->where('year', '(2019|2020|2021|2022|2023|2024)');
