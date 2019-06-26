<?php

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_WARNING);
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'HomeController@post']);

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'destroy'=>'admin.users.destroy',
        'edit'=>'admin.users.edit'
    ]]);
    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'destroy'=>'admin.posts.destroy',
        'edit'=>'admin.posts.edit'
    ]]);
    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'destroy'=>'admin.categories.destroy',
        'edit'=>'admin.categories.edit'
    ]]);
    Route::resource('admin/media', 'MediaController', ['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'destroy'=>'admin.media.destroy',
        'edit'=>'admin.media.edit'
    ]]);
    Route::resource('admin/comments', 'PostCommentsController', ['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'destroy'=>'admin.comments.destroy',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show'
    ]]);
    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names'=>[
        'index'=>'admin.comment.replies.index',
        'create'=>'admin.comment.replies.create',
        'store'=>'admin.comment.replies.store',
        'destroy'=>'admin.comment.replies.destroy',
        'edit'=>'admin.comment.replies.edit',
        'show'=>'admin.comment.replies.show'
    ]]);

    Route::delete('admin/delete/media', 'MediaController@deleteMedia');


});

Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');
});
