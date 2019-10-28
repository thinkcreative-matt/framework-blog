<?php 



//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Controllers'], function() {

	// Get a single specified blog post
	Route::get('blog/{slug}', 'BlogController@show');

	// Get the blog posts. We dont need to do anything else here. 
    Route::get('blog', 'BlogController@index');

})->name('blog');


/**
 * Admin routes
 */

//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Admin\Controllers', 'prefix' => 'admin'], function() {

	// Get the blog posts. We dont need to do anything else here. 
    Route::resource('blog', 'BlogController');

});