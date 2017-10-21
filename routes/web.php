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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    
    Route::get('/category', 'CategoriesController@index')->name('category');
    
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');

    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
    
    Route::get('/category/destroy/{id}', 'CategoriesController@destroy')->name('category.destroy');

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/post/create', 'PostsController@create')->name('post.create');

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);
    
    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);
    
    Route::get('/post/destroy/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.destroy'
    ]);

    Route::get('/tags', 'TagsController@index')->name('tags');
    
    Route::get('/tags/create', 'TagsController@create')->name('tags.create');
    
    Route::post('/tags/store', 'TagsController@store')->name('tags.store');
    
    Route::get('/tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
    
    Route::post('/tags/update/{id}', 'TagsController@update')->name('tags.update');
    
    Route::get('/tags/delete/{id}', 'TagsController@destroy')->name('tags.delete');

    Route::get('/test', function(){
        return App\User::find(1)->profile;
    });

    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('/user/nadmin/{id}', 'UsersController@nadmin')->name('user.nadmin')->middleware('admin');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
    Route::post('/user/update/{id}', 'UsersController@update')->name('user.update');
});

