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
Route::get('/kiyaku','MemoryMapController@kiyaku');

Route::get('/policy','MemoryMapController@policy');

Route::get('/torokuGamen', 'MemoryMapController@torokuGamen');

Route::get('/ichiranGamen', 'MemoryMapController@ichiranGamen');

Route::post('/insertInfo', 'MemoryMapController@insertInfo');

Route::get('/shosaiGamen/{id}', 'MemoryMapController@shosaiGamen');

Route::post('/henshuGamen', 'MemoryMapController@henshuGamen');

Route::post('/updateInfo', 'MemoryMapController@updateInfo');

Route::post('/deleteInfo', 'MemoryMapController@deleteInfo');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('/home','MemoryMapController@displayMap');

Route::get('/', function () {
    // redirect�֐��Ƀp�X���w�肷����@
    return redirect('/login');
});
