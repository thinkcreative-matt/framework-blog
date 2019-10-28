<?php 



/**
 * Admin routes
 */

//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Admin\Controllers', 'prefix' => 'admin',  'as' => 'admin.'], function() {

	// Get the blog posts. We dont need to do anything else here. 
    Route::resource('blog', 'BlogController');

});

//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Controllers'], function() {

	// Get a single specified blog post
	Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

	// Get the blog posts. We dont need to do anything else here. 
    Route::get('blog', 'BlogController@index')->name('blog');

});


