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


////////////////// Frontend Routes
 Route::get('/','FrontEndController@index')->name('backendhome');
 Route::get('post/{slug}','FrontEndController@singlepost')->name('post.single');
 Route::get('category/{id}','FrontEndController@category')->name('category.single');
 Route::get('tag/{id}','FrontEndController@tag')->name('tag.single');
 Route::get('/result','FrontEndController@search')->name('search');




 ////////////////// Backend Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::resource('settings','settingscontroller');
    Route::resource('profile','profilecontroller');
    Route::resource('tag','tagcontroller');
    Route::resource('user','usercontroller');
    Route::resource('post','postcontroller');
    Route::resource('category','categorycontroller');

    Route::get('trashed','postcontroller@alltrashed')->name('trashed.post');
    Route::get('posts/delete/{id}','postcontroller@trashed')->name('post.trashed');
    Route::get('posts/destroy/{id}','postcontroller@destroy')->name('post.destroy');
    Route::get('post/restore/{id}','postcontroller@restoree')->name('post.restore');
    Route::get('makeAdmin/{id}','usercontroller@makeAdmin')->name('user.admin');
    Route::get('users/destroy/{id}','usercontroller@destroy')->name('user.destroy');
    Route::get('user/makeAdmin/{id}','usercontroller@removeAdmin')->name('user.removeadmin');
});






Route::post('/subscribed',function(){
    $email=request('email');
    Newsletter::subscribe($email);
    session()->flash('subscribed','Successfully subscribed ');
    return redirect()->back();

});
