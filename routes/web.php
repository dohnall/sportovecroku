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

echo '<!-- '.date('Y-m-d H:i:s').' -->';

if(time() >= mktime(22, 0, 0, 9, 30, 2020) && time() < mktime(22, 0, 0, 10, 31, 2020)) {
    Route::get('/', 'VotesController@beforeIndex');
} elseif(time() >= mktime(22, 0, 0, 8, 31, 2020) && time() < mktime(22, 0, 0, 9, 30, 2020) || isset($_GET['nominace'])) {
    Route::get('/', 'VotesController@nomination');
    Route::post('/', 'VotesController@nominationStore');
} elseif(time() >= mktime(22, 0, 0, 10, 31, 2020) && time() < mktime(22, 0, 0, 12, 15, 2020)) {
    Route::get('/', 'VotesController@index');
    Route::post('/', 'VotesController@store');
    Route::get('/{hash}', 'VotesController@confirm')->where('hash', '[a-f0-9]{32}');
} elseif(time() >= mktime(22, 0, 0, 1, 5, 2021) && time() < mktime(22, 0, 0, 2, 1, 2021)) {
    Route::get('/', 'VotesController@afterIndex');
} else {
    Route::get('/', 'VotesController@results');
}
Route::get('/archive/{year}', 'VotesController@archive')->where('year', '(2019)');
