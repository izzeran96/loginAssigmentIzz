<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/','LoginController@index')->name('signInPage');
Route::post('signinPost','LoginController@loginPost')->name('signinPost');
Route::get('register','RegisterController@index')->name('registerPage');
Route::post('registerPost','RegisterController@registerPost')->name('registerPost');
Route::middleware(['auth'])->group(function () {
    Route::get('myaccount','DashboardController@MyAccount')->name('myaccount');
    Route::patch('myaccount/post','DashboardController@MyAccountPost')->name('myaccountPost');
    Route::prefix('access')->group(function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('activity','DashboardController@userActivity')->name('userActivity');

    Route::get('cms','CmsPostController@index')->name('cms.index');
    Route::get('cms/create','CmsPostController@cmsContent')->name('cms.post');
    Route::post('cms/create/post','CmsPostController@cmsPostContent')->name('cms.createPost');

    Route::get('cms/edit/{title}/{id}','CmsPostController@edit')->name('cms.edit');

    Route::get('create','DashboardController@userCreate')->name('createUser');
    Route::post('create/post','DashboardController@userCreatePost')->name('createUserPost');
    Route::get('edit/{id}','DashboardController@userEdit')->name('editUser');
    Route::patch('edit/{id}/post','DashboardController@userEditPost')->name('editUserPost');
    Route::delete('users/{id}', 'DashboardController@deleteUser')->name('deleteUser');
    });
    Route::get('logout','LoginController@logout')->name('logout');
});

