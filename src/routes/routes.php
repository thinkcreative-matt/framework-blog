<?php 



//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Controllers'], function() {

	// Get the blog posts. We dont need to do anything else here. 
    Route::get('blog', ['uses' => 'BlogController@index']);

});

//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Controllers', 'prefix' => 'admin'], function() {

	// Get the blog posts. We dont need to do anything else here. 
    Route::get('blog', ['uses' => 'BlogController@index']);

});