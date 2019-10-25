<?php 


Route::get('blog', function() {

	// Test that our functions are loaded. 
	dd( blog() );

	return 'hello';

});


//  Ensure we are using the blog we want to. 
Route::group(['namespace' => 'Thinkcreative\Blog\Controller'], function() {

	// Get the blog posts. We dont need to do anything else here. 
    Route::get('blog', ['uses' => 'BlogController@index']);

});