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

$ips = [
    '37.221.242.83',
    '::1',
];

if(isset($_GET['before'])) {
    Route::get('/', 'VotesController@beforeIndex');
} elseif(isset($_GET['after'])) {
    Route::get('/', 'VotesController@afterIndex');
} elseif(in_array(request()->ip(), $ips)) {
    Route::get('/', 'VotesController@index');
    Route::post('/', 'VotesController@store');
    Route::get('/{hash}', 'VotesController@confirm')->where('hash', '[a-f0-9]{32}');
} elseif(time() >= mktime(0, 0, 0, 11, 1, 2019) && time() < mktime(0, 0, 0, 11, 15, 2019)) {
    Route::get('/', 'VotesController@beforeIndex');
} elseif(time() >= mktime(0, 0, 0, 11, 15, 2019) && time() < mktime(0, 0, 0, 12, 11, 2019)) {
    Route::get('/', 'VotesController@index');
    Route::post('/', 'VotesController@store');
    Route::get('/{hash}', 'VotesController@confirm')->where('hash', '[a-f0-9]{32}');
} else {
    Route::get('/', 'VotesController@afterIndex');
}
