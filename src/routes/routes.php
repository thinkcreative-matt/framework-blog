<?php 


Route::get('blog', function() {

	// Test that our functions are loaded. 
	dd( blog() );

	return 'hello';

});


Route::get('Admin/BlogOptions', 'Admin/BlogOptionsController@index');

Route::resource('Admin/Blog', 'Admin/BlogController');