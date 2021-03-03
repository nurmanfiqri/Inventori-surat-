<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\LoginController;

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

Route::get('/', 'Auth\LoginController@index');
Route::post('/postlogin', 'Auth\LoginController@postlogin');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    // Halaman Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    //Halaman User
    Route::get('/user', 'User\UserController@index')->name('user');
    Route::get('/user/create', 'User\UserController@create')->name('createuser');
    // Halaman Route
    Route::get('/role', 'Role\RoleController@index')->name('role');
    Route::get('/role/create', 'Role\RoleController@create')->name('createrole');
    Route::post('/role/create', 'Role\RoleController@create')->name('createrole');
    // Halaman Menu
    Route::get('/menu', 'Menu\MenuController@index')->name('menu');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {
    // Halaman Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    // Halaman approval
    Route::get('/approvallist', 'Approval\ApprovalController@approvallist')->name('approvallist');
    //halaman master data surat 
    Route::get('/masterdatasurat', 'Master\MasterController@index')->name('master');
    //Halmanan Approval Log
    Route::get('/approvallog', 'Approval\ApprovalController@approvallog')->name('approvallog');
});

// Route::group(['prefix' => 'user'],  function () {
//     Route::get('/', 'User\UserController@index');
// });

// Route::group(['middleware', ['authLogin']], function () {
//     Route::get('/user', 'User\UserController@index');
// });

// Route::group(['prefix' => 'role'], function () {
//     Route::get('/', 'Role\RoleController@index');
// });

// Route::get('/menu', function () {
//     return view('user.index');
// });
