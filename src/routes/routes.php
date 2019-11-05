<?php 
/**
 * Admin routes
 */

// Ensure we are using the blog we want to. 
// We will eventually lock this down to 'admin user'
Route::group(['namespace' => 'Thinkcreative\Blog\Admin\Controllers', 'prefix' => 'admin',  'as' => 'admin.', 'middleware' => 'web'], function() {

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


